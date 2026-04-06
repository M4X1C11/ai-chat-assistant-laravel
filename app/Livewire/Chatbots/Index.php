<?php

namespace App\Livewire\Chatbots;

use App\Models\Chatbot;
use Livewire\Component;

class Index extends Component
{
    public function delete(Chatbot $chatbot)
    {
        abort_if($chatbot->user_id !== auth()->id(), 403);
        $chatbot->delete();
    }

    public function render()
    {
        return view('livewire.chatbots.index', [
            'chatbots' => auth()->user()->chatbots()->latest()->get()
        ])->layout('layouts.app');
    }
}
