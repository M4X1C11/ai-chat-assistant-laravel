<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Chatbots\Index as ChatbotsIndex;
use App\Livewire\Chatbots\Create as ChatbotsCreate;
use App\Livewire\Chatbots\Edit as ChatbotsEdit;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chatbots', ChatbotsIndex::class)->name('chatbots.index');
    Route::get('/chatbots/create', ChatbotsCreate::class)->name('chatbots.create');
    Route::get('/chatbots/{chatbot}/edit', ChatbotsEdit::class)->name('chatbots.edit');
    Route::get('/chatbots/{chatbot}/conversations', \App\Livewire\Chatbots\Conversations::class)->name('chatbots.conversations');


});

require __DIR__.'/auth.php';
