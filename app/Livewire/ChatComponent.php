<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Services\GeminiService;

class ChatComponent extends Component
{
    public $message = '';

    public function sendMessage()
    {
        $text = trim($this->message);
        if (empty($text)) return;

        Message::create([
            'user_id' => auth()->id(),
            'role' => 'user',
            'content' => $text
        ]);

        $this->message = '';

        $service = new GeminiService();
        $history = Message::where('user_id', auth()->id())
            ->latest()
            ->take(10)
            ->get()
            ->reverse()
            ->map(fn($m) => [
                'role' => ($m->role === 'model') ? 'model' : 'user',
                'parts' => [['text' => $m->content]]
            ])->toArray();

        $aiResponse = $service->ask($history);

        Message::create([
            'user_id' => auth()->id(),
            'role' => 'model',
            'content' => $aiResponse
        ]);

        $this->dispatch('scroll-down');
    }

    public function clearHistory()
    {
        Message::where('user_id', auth()->id())->delete();
    }

    public function render()
    {
        return view('livewire.chat-component', [
            'messages' => Message::where('user_id', auth()->id())->oldest()->get()
        ]);
    }
}
