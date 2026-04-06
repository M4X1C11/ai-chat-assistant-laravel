<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chatbot;
use App\Models\Conversation;
use App\Services\GeminiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class WidgetController extends Controller
{
    public function chat(Request $request, string $token)
    {
        $key = 'widget:' . $token . ':' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 30)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'error' => 'Too many messages. Please wait ' . $seconds . ' seconds.'
            ], 429);
        }

        RateLimiter::hit($key, 60);

        $chatbot = Chatbot::where('token', $token)->where('is_active', true)->first();

        if (!$chatbot) {
            return response()->json(['error' => 'Chatbot not found.'], 404);
        }

        $request->validate([
            'message' => 'required|string|max:1000',
            'session_id' => 'required|string',
        ]);

        $conversation = Conversation::firstOrCreate(
            [
                'chatbot_id' => $chatbot->id,
                'session_id' => $request->session_id,
            ],
            [
                'visitor_ip' => $request->ip(),
            ]
        );

        $conversation->messages()->create([
            'role' => 'user',
            'content' => $request->message,
        ]);

        $history = $conversation->messages()
            ->latest()
            ->take(10)
            ->get()
            ->reverse()
            ->map(fn($m) => [
                'role' => $m->role,
                'parts' => [['text' => $m->content]],
            ])->values()->toArray();

        $service = new GeminiService();
        $aiResponse = $service->ask($history, $chatbot->system_prompt);

        $conversation->messages()->create([
            'role' => 'model',
            'content' => $aiResponse,
        ]);

        return response()->json(['message' => $aiResponse]);
    }
}
