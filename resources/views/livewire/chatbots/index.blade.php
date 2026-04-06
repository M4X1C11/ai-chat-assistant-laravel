<div>
    <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8 relative">
        <div class="flex flex-row justify-between items-start mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Chatbots</h1>
                <p class="text-sm text-gray-500 mt-1">Manage your AI assistants</p>
            </div>
            <a href="{{ route('chatbots.create') }}"
               class="shrink-0 inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition">
                + New Chatbot
            </a>
        </div>
        @if($chatbots->isEmpty())
            <div class="flex flex-col items-center justify-center py-24 bg-white rounded-2xl border border-dashed border-gray-200">
                <div class="text-5xl mb-4">🤖</div>
                <h2 class="text-lg font-semibold text-gray-700">No chatbots yet</h2>
                <p class="text-sm text-gray-400 mt-1">Create your first AI assistant to get started</p>
                <a href="{{ route('chatbots.create') }}"
                   class="mt-6 px-5 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition">
                    Create Chatbot
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 gap-4">
                @foreach($chatbots as $chatbot)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center justify-between hover:shadow-md transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center text-2xl">
                                🤖
                            </div>
                            <div>
                                <h2 class="text-base font-semibold text-gray-900">{{ $chatbot->name }}</h2>
                                <p class="text-sm text-gray-400 mt-0.5">{{ Str::limit($chatbot->system_prompt, 80) }}</p>
                                <span class="inline-block mt-2 px-2.5 py-0.5 text-xs font-medium rounded-full {{ $chatbot->is_active ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-500' }}">
                                    {{ $chatbot->is_active ? '● Active' : '● Inactive' }}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('chatbots.edit', $chatbot) }}"
                               class="px-4 py-2 text-sm font-medium bg-gray-50 text-gray-600 rounded-xl hover:bg-gray-100 transition">
                                Edit
                            </a>
                            <a href="{{ route('chatbots.conversations', $chatbot) }}"
                               class="px-4 py-2 text-sm font-medium bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-100 transition">
                                Conversations
                            </a>
                            <button wire:click="delete({{ $chatbot->id }})"
                                    wire:confirm="Are you sure you want to delete this chatbot?"
                                    class="px-4 py-2 text-sm font-medium bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition">
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
