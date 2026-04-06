(function () {
    const config = window.AISupportConfig || {};
    const token = config.token || '';
    const baseUrl = config.baseUrl || '';
    const title = config.title || 'AI Assistant';

    if (!token || !baseUrl) return;

    const sessionId = Math.random().toString(36).substring(2) + Date.now().toString(36);

    const styles = `
        #ai-support-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #4f46e5;
            color: white;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 24px rgba(79,70,229,0.4);
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: transform 0.2s;
        }
        #ai-support-btn:hover { transform: scale(1.1); }
        #ai-support-box {
            position: fixed;
            bottom: 92px;
            right: 24px;
            width: 360px;
            height: 520px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.15);
            display: none;
            flex-direction: column;
            z-index: 9998;
            overflow: hidden;
            font-family: 'Figtree', sans-serif;
        }
        #ai-support-box.open { display: flex; }
        #ai-support-header {
            background: #4f46e5;
            color: white;
            padding: 16px 20px;
            font-weight: 600;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        #ai-support-messages {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #f8f8fb;
        }
        .ai-msg {
            max-width: 80%;
            padding: 10px 14px;
            border-radius: 16px;
            font-size: 14px;
            line-height: 1.5;
        }
        .ai-msg.user {
            background: #4f46e5;
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }
        .ai-msg.bot {
            background: white;
            color: #1f2937;
            align-self: flex-start;
            border-bottom-left-radius: 4px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        .ai-msg.typing {
            background: white;
            color: #9ca3af;
            align-self: flex-start;
            border-bottom-left-radius: 4px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        #ai-support-input-area {
            padding: 12px 16px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            gap: 8px;
            background: white;
        }
        #ai-support-input {
            flex: 1;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 14px;
            outline: none;
            transition: border 0.2s;
        }
        #ai-support-input:focus { border-color: #4f46e5; }
        #ai-support-send {
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 16px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }
        #ai-support-send:hover { background: #4338ca; }
        #ai-support-send:disabled { background: #a5b4fc; cursor: not-allowed; }
    `;

    const styleEl = document.createElement('style');
    styleEl.textContent = styles;
    document.head.appendChild(styleEl);

    document.body.innerHTML += `
        <button id="ai-support-btn">💬</button>
        <div id="ai-support-box">
            <div id="ai-support-header">🤖 ${title}</div>
            <div id="ai-support-messages"></div>
            <div id="ai-support-input-area">
                <input id="ai-support-input" type="text" placeholder="Type a message..." />
                <button id="ai-support-send">Send</button>
            </div>
        </div>
    `;

    const btn = document.getElementById('ai-support-btn');
    const box = document.getElementById('ai-support-box');
    const messages = document.getElementById('ai-support-messages');
    const input = document.getElementById('ai-support-input');
    const send = document.getElementById('ai-support-send');

    btn.addEventListener('click', () => box.classList.toggle('open'));

    function addMessage(text, type) {
        const el = document.createElement('div');
        el.className = `ai-msg ${type}`;
        el.textContent = text;
        messages.appendChild(el);
        messages.scrollTop = messages.scrollHeight;
        return el;
    }

    async function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        input.value = '';
        send.disabled = true;
        addMessage(text, 'user');
        const typing = addMessage('Typing...', 'typing');

        try {
            const res = await fetch(`${baseUrl}/api/widget/${token}/chat`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text, session_id: sessionId }),
            });

            const data = await res.json();
            typing.remove();
            addMessage(data.message || 'Error.', 'bot');
        } catch (e) {
            typing.remove();
            addMessage('Connection error.', 'bot');
        }

        send.disabled = false;
        input.focus();
    }

    send.addEventListener('click', sendMessage);
    input.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
})();
