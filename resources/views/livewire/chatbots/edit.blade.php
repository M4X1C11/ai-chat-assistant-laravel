<div>
    <div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('chatbots.index') }}"
               class="text-sm text-gray-400 hover:text-gray-600 transition">
                ← Back to Chatbots
            </a>
            <h1 class="text-3xl font-bold text-gray-900 mt-4">Edit Chatbot</h1>
            <p class="text-sm text-gray-500 mt-1">Update your AI assistant settings</p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Chatbot Name
                    </label>
                    <input
                        type="text"
                        wire:model.blur="name"
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
                        wire:model.blur="system_prompt"
                        rows="6"
                        placeholder="You are a helpful assistant for..."
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition resize-none"
                    ></textarea>
                    @error('system_prompt')
                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1.5 text-xs text-gray-400">Define how your chatbot should behave and what it knows about.</p>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Active Status</p>
                        <p class="text-xs text-gray-400 mt-0.5">Disable to stop the chatbot from responding</p>
                    </div>
                    <button type="button" wire:click="$toggle('is_active')"
                            class="relative inline-flex h-6 w-11 items-center rounded-full transition {{ $is_active ? 'bg-indigo-600' : 'bg-gray-200' }}">
                        <span class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition {{ $is_active ? 'translate-x-6' : 'translate-x-1' }}"></span>
                    </button>
                </div>

                <div class="bg-gray-50 rounded-xl p-4 space-y-2">
                    <p class="text-xs font-medium text-gray-500">Embed Snippet</p>
                    <p class="text-xs text-gray-400">Copy and paste this before the closing &lt;/body&gt; tag on your website.</p>
                    <pre class="bg-gray-900 text-green-400 text-xs rounded-xl p-4 overflow-x-auto whitespace-pre-wrap break-all"><code>&lt;script&gt;
window.AISupportConfig = {
    token: "{{ $chatbot->token }}",
    baseUrl: "{{ config('app.url') }}",
    title: "{{ $chatbot->name }}"
};
&lt;/script&gt;
&lt;script src="{{ config('app.url') }}/widget.js"&gt;&lt;/script&gt;</code></pre>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button"
                            id="btn-cancel"
                            class="px-5 py-2.5 text-sm font-medium bg-gray-50 text-gray-600 rounded-xl hover:bg-gray-100 transition">
                        Cancel
                    </button>
                    <button type="button"
                            id="btn-save"
                            class="px-5 py-2.5 text-sm font-medium bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('btn-save').addEventListener('click', function () {
                if (confirm('Are you sure you want to save these changes?')) {
                    @this.save();
                }
            });
            document.getElementById('btn-cancel').addEventListener('click', function () {
                if (confirm('Are you sure you want to cancel? Unsaved changes will be lost.')) {
                    @this.cancel();
                }
            });
        });
    </script>
</div>
