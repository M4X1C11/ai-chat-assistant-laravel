<?php

namespace App\Livewire\Chatbots;

use App\Models\Chatbot;
use App\Models\Conversation;
use Livewire\Component;
use Livewire\WithPagination;

class Conversations extends Component
{
    use WithPagination;

    public Chatbot $chatbot;
    public ?int $selectedConversation = null;

    public function mount(Chatbot $chatbot)
    {
        abort_if($chatbot->user_id !== auth()->id(), 403);
        $this->chatbot = $chatbot;
    }

    public function selectConversation(int $id)
    {
        $this->selectedConversation = $id;
    }

    public function clearSelected()
    {
        $this->selectedConversation = null;
    }

    public function render()
    {
        $conversations = $this->chatbot->conversations()
            ->withCount('messages')
            ->latest()
            ->paginate(10);

        $messages = null;
        if ($this->selectedConversation) {
            $messages = Conversation::find($this->selectedConversation)?->messages()->oldest()->get();
        }

        return view('livewire.chatbots.conversations', compact('conversations', 'messages'))
            ->layout('layouts.app');
    }
}
