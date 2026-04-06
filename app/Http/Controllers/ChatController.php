<?php

namespace App\Http\Controllers;

use App\Services\GeminiService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected $gemini;


    public function __construct(GeminiService $gemini)
    {
        $this->gemini = $gemini;
    }


    public function index()
    {
        return view('chat');
    }

    public function send(Request $request)
    {

        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $userMessage = $request->input('message');


        $aiResponse = $this->gemini->ask($userMessage);

        return response()->json([
            'reply' => $aiResponse
        ]);
    }
}
