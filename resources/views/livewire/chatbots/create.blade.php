<div>
    <div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('chatbots.index') }}" wire:navigate
               class="text-sm text-gray-400 hover:text-gray-600 transition">
                ← Back to Chatbots
            </a>
            <h1 class="text-3xl font-bold text-gray-900 mt-4">Create Chatbot</h1>
            <p class="text-sm text-gray-500 mt-1">Set up your new AI assistant</p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <form wire:submit="save" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Chatbot Name
                    </label>
                    <input
                        type="text"
                        wire:model.live="name"
                        placeholder="e.g. Customer Support Bot"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    />
                    @error('name')
                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        System Prompt
                    </label>
                    <textarea
                        wire:model.live="system_prompt"
                        rows="6"
                        placeholder="You are a helpful assistant for..."
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition resize-none"
                    ></textarea>
                    @error('system_prompt')
                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1.5 text-xs text-gray-400">Define how your chatbot should behave and what it knows about.</p>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <a href="{{ route('chatbots.index') }}" wire:navigate
                       class="px-5 py-2.5 text-sm font-medium bg-gray-50 text-gray-600 rounded-xl hover:bg-gray-100 transition">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-5 py-2.5 text-sm font-medium bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                        Create Chatbot
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
