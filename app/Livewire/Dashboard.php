<?php

namespace App\Livewire;

use App\Models\Chatbot;
use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;

class Dashboard extends Component
{
    public int $totalChatbots = 0;
    public int $totalConversations = 0;
    public int $totalMessages = 0;
    public int $activeChatbots = 0;

    public function mount()
    {
        $user = auth()->user();

        $chatbotIds = $user->chatbots()->pluck('id');

        $this->totalChatbots = $chatbotIds->count();
        $this->activeChatbots = $user->chatbots()->where('is_active', true)->count();
        $this->totalConversations = Conversation::whereIn('chatbot_id', $chatbotIds)->count();
        $this->totalMessages = Message::whereHas('conversation', function ($q) use ($chatbotIds) {
            $q->whereIn('chatbot_id', $chatbotIds);
        })->count();
    }

    public function render()
    {
        $recentChatbots = auth()->user()->chatbots()->latest()->take(5)->get();

        return view('livewire.dashboard', compact('recentChatbots'))
            ->layout('layouts.app');
    }
}
