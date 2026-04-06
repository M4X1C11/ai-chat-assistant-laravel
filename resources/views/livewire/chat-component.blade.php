<div id="chat-scope" class="chat-wrapper">
    <header class="chat-header">
        <div class="logo-area">
            <span class="status-dot"></span>
            <h2 class="logo">DEV_TERMINAL_v2.5</h2>
        </div>
        <div class="actions">
            <button onclick="toggleTheme()" class="theme-btn">🌙/☀️</button>
            <button wire:click="clearHistory" class="clear-btn">DEL_LOGS</button>
        </div>
    </header>

    <main class="chat-main" id="chat-window">
        @foreach($messages as $msg)
            <div class="message-row {{ $msg->role == 'user' ? 'user-row' : 'bot-row' }}">
                <div class="bubble">
                    <div class="sender-label">{{ $msg->role == 'user' ? 'YOU' : 'AI_SYSTEM' }}</div>
                    <p>{{ $msg->content }}</p>
                </div>
            </div>
        @endforeach
    </main>

    <footer class="chat-footer">
        <div class="input-wrapper">
            <input
                type="text"
                wire:model="message"
                wire:keydown.enter="sendMessage"
                placeholder="Napiši poruku i pritisni Enter..."
                autocomplete="off"
            >
            <button wire:click="sendMessage" class="send-btn">SEND</button>
        </div>
    </footer>

    <style>
        :root { --bg: #f8fafc; --panel: #ffffff; --text: #1e293b; --border: #e2e8f0; --accent: #4f46e5; --bubble-user: #4f46e5; --input-bg: #f1f5f9; }
        .dark-mode { --bg: #020617; --panel: #0f172a; --text: #f1f5f9; --border: #1e293b; --accent: #6366f1; --bubble-user: #6366f1; --input-bg: #1e293b; }
        .chat-wrapper { display: flex; flex-direction: column; height: 100vh; background: var(--bg); color: var(--text); }
        .chat-header { display: flex; justify-content: space-between; padding: 1rem; background: var(--panel); border-bottom: 1px solid var(--border); }
        .chat-main { flex: 1; overflow-y: auto; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; }
        .message-row { display: flex; width: 100%; margin-bottom: 10px; }
        .user-row { justify-content: flex-end; }
        .bot-row { justify-content: flex-start; }
        .bubble { max-width: 70%; padding: 12px; border-radius: 10px; background: var(--panel); border: 1px solid var(--border); }
        .user-row .bubble { background: var(--bubble-user); color: white; border: none; }
        .chat-footer { padding: 1.5rem; background: var(--panel); border-top: 1px solid var(--border); }
        .input-wrapper { display: flex; gap: 10px; max-width: 800px; margin: 0 auto; background: var(--input-bg); padding: 5px; border-radius: 10px; }
        input { flex: 1; background: transparent; border: none; padding: 10px; color: var(--text); outline: none; }
        .send-btn { background: var(--accent); color: white; border: none; padding: 0 20px; border-radius: 8px; cursor: pointer; }
        .theme-btn { cursor: pointer; background: transparent; border: 1px solid var(--border); color: var(--text); padding: 5px 10px; border-radius: 5px; }
        .clear-btn { color: #ef4444; border: 1px solid #ef4444; background: transparent; cursor: pointer; padding: 5px 10px; border-radius: 5px; font-size: 0.7rem; }
    </style>

    <script>
        function toggleTheme() {
            const scope = document.getElementById('chat-scope');
            scope.classList.toggle('dark-mode');
            localStorage.setItem('theme', scope.classList.contains('dark-mode') ? 'dark' : 'light');
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('theme') === 'dark') {
                document.getElementById('chat-scope').classList.add('dark-mode');
            }
            window.scrollToBottom();
        });

        window.scrollToBottom = function() {
            const win = document.getElementById('chat-window');
            if(win) win.scrollTop = win.scrollHeight;
        }

        window.addEventListener('scroll-down', () => {
            setTimeout(window.scrollToBottom, 100);
        });
    </script>
</div>
