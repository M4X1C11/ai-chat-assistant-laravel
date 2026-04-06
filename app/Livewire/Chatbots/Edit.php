<?php

namespace App\Livewire\Chatbots;

use App\Models\Chatbot;
use Livewire\Component;

class Edit extends Component
{
    public Chatbot $chatbot;
    public string $name = '';
    public string $system_prompt = '';
    public bool $is_active = true;

    public function mount(Chatbot $chatbot)
    {
        abort_if($chatbot->user_id !== auth()->id(), 403);
        $this->chatbot = $chatbot;
        $this->name = $chatbot->name;
        $this->system_prompt = $chatbot->system_prompt;
        $this->is_active = (bool) $chatbot->is_active;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'system_prompt' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $this->chatbot->update([
            'name' => $this->name,
            'system_prompt' => $this->system_prompt,
            'is_active' => $this->is_active,
        ]);

        return redirect()->route('chatbots.index');
    }

    public function cancel()
    {
        return redirect()->route('chatbots.index');
    }

    public function render()
    {
        return view('livewire.chatbots.edit')
            ->layout('layouts.app');
    }
}
