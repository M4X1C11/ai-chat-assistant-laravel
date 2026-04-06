<div>
    <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-sm text-gray-500 mt-1">Welcome back, {{ auth()->user()->name }} 👋</p>
        </div>

        {{-- STATS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-all duration-200">
                <p class="text-sm font-medium text-gray-500">Total Chatbots</p>
                <p class="text-4xl font-extrabold text-gray-900 mt-2">{{ $totalChatbots }}</p>
                <p class="text-xs text-gray-400 mt-1">All your bots</p>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-all duration-200">
                <p class="text-sm font-medium text-gray-500">Active Chatbots</p>
                <p class="text-4xl font-extrabold text-emerald-500 mt-2">{{ $activeChatbots }}</p>
                <p class="text-xs text-gray-400 mt-1">Currently running</p>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-all duration-200">
                <p class="text-sm font-medium text-gray-500">Total Conversations</p>
                <p class="text-4xl font-extrabold text-indigo-500 mt-2">{{ $totalConversations }}</p>
                <p class="text-xs text-gray-400 mt-1">Across all bots</p>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-all duration-200">
                <p class="text-sm font-medium text-gray-500">Total Messages</p>
                <p class="text-4xl font-extrabold text-violet-500 mt-2">{{ $totalMessages }}</p>
                <p class="text-xs text-gray-400 mt-1">Sent and received</p>
            </div>
        </div>

        {{-- RECENT CHATBOTS --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Recent Chatbots</h2>
                <a href="{{ route('chatbots.index') }}"
                   class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition">
                    View all →
                </a>
            </div>

            @if($recentChatbots->isEmpty())
                <div class="text-center py-12">
                    <div class="text-4xl mb-3">🤖</div>
                    <p class="text-gray-500 text-sm">No chatbots yet.</p>
                    <a href="{{ route('chatbots.create') }}"
                       class="inline-block mt-4 px-5 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700 transition">
                        Create your first bot
                    </a>
                </div>
            @else
                <div class="divide-y divide-gray-50">
                    @foreach($recentChatbots as $chatbot)
                        <div class="py-4 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center text-xl">🤖</div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $chatbot->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $chatbot->conversations()->count() }} conversations</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="px-2.5 py-0.5 text-xs font-medium rounded-full {{ $chatbot->is_active ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-500' }}">
                                    {{ $chatbot->is_active ? '● Active' : '● Inactive' }}
                                </span>
                                <a href="{{ route('chatbots.edit', $chatbot) }}"
                                   class="text-sm font-medium text-gray-400 hover:text-gray-600 transition">
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
