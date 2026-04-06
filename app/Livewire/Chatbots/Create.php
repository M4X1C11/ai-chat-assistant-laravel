<?php

namespace App\Livewire\Chatbots;

use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $system_prompt = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'system_prompt' => 'required|string',
        ]);

        auth()->user()->chatbots()->create([
            'name' => $this->name,
            'system_prompt' => $this->system_prompt,
        ]);

        return redirect()->route('chatbots.index');
    }

    public function render()
    {
        return view('livewire.chatbots.create')
            ->layout('layouts.app');
    }
}
