<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected string $apiKey;
    protected string $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent";

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
    }

    public function ask(array $history, string $systemPrompt): string
    {
        try {
            $response = Http::withoutVerifying()
                ->timeout(30)
                ->post("{$this->url}?key={$this->apiKey}", [
                    'contents' => $history,
                    'systemInstruction' => [
                        'parts' => [['text' => $systemPrompt]]
                    ]
                ]);

            if ($response->successful()) {
                return $response->json('candidates.0.content.parts.0.text') ?? 'No response.';
            }

            Log::error('Gemini API Error: ' . $response->body());
            return 'Error: ' . ($response->json('error.message') ?? 'Unknown error.');

        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            return 'System error occurred.';
        }
    }
}
