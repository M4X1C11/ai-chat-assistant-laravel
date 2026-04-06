<div>
    <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <a href="{{ route('chatbots.index') }}"
                   class="text-sm text-gray-400 hover:text-gray-600 transition">
                    ← Back to Chatbots
                </a>
                <h1 class="text-3xl font-bold text-gray-900 mt-4">Conversations</h1>
                <p class="text-sm text-gray-500 mt-1">{{ $chatbot->name }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- CONVERSATIONS LIST --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    @if($conversations->isEmpty())
                        <div class="p-8 text-center">
                            <div class="text-4xl mb-3">💬</div>
                            <p class="text-sm text-gray-500">No conversations yet.</p>
                        </div>
                    @else
                        <div class="divide-y divide-gray-50">
                            @foreach($conversations as $conversation)
                                <button
                                    wire:click="selectConversation({{ $conversation->id }})"
                                    class="w-full text-left px-5 py-4 hover:bg-gray-50 transition {{ $selectedConversation === $conversation->id ? 'bg-indigo-50 border-l-4 border-indigo-500' : '' }}">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-800">
                                                Session #{{ $conversation->id }}
                                            </p>
                                            <p class="text-xs text-gray-400 mt-0.5">
                                                {{ $conversation->messages_count }} messages
                                            </p>
                                        </div>
                                        <p class="text-xs text-gray-400">
                                            {{ $conversation->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                        <div class="px-4 py-3 border-t border-gray-50">
                            {{ $conversations->links() }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- MESSAGES --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm h-full">
                    @if(!$selectedConversation)
                        <div class="flex flex-col items-center justify-center h-64">
                            <div class="text-4xl mb-3">👈</div>
                            <p class="text-sm text-gray-500">Select a conversation to view messages</p>
                        </div>
                    @else
                        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-50">
                            <h2 class="text-sm font-semibold text-gray-800">Session #{{ $selectedConversation }}</h2>
                            <button wire:click="clearSelected" class="text-xs text-gray-400 hover:text-gray-600 transition">
                                Close
                            </button>
                        </div>
                        <div class="p-6 space-y-4 overflow-y-auto max-h-[600px]">
                            @forelse($messages as $message)
                                <div class="flex {{ $message->role === 'user' ? 'justify-end' : 'justify-start' }}">
                                    <div class="max-w-[75%] px-4 py-3 rounded-2xl text-sm {{ $message->role === 'user' ? 'bg-indigo-600 text-white rounded-br-sm' : 'bg-gray-100 text-gray-800 rounded-bl-sm' }}">
                                        {{ $message->content }}
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-sm text-gray-400">No messages in this conversation.</p>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
