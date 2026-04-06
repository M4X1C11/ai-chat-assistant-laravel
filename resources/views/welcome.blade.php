<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiBot — AI Chatbot Widget for Your Website</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-900">

{{-- NAVBAR --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <span class="text-xl font-bold text-indigo-600">WiBot</span>

        <div class="hidden sm:flex items-center gap-1">
            <a href="#how-it-works" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition">How It Works</a>
            <a href="#features" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition">Features</a>
            <a href="#pricing" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition">Pricing</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                <a href="{{ route('chatbots.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 text-sm font-medium bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                    Get Started Free
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- HERO --}}
<section class="pt-32 pb-24 px-4">
    <div class="max-w-4xl mx-auto text-center">
        <span class="inline-block px-4 py-1.5 bg-indigo-50 text-indigo-600 text-sm font-medium rounded-full mb-6">
            🤖 AI-Powered Chat Widget
        </span>
        <h1 class="text-5xl sm:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
            Add AI Support to<br>
            <span class="text-indigo-600">Any Website</span> in Minutes
        </h1>
        <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto">
            WiBot lets you create a custom AI chatbot and embed it on any website with a single snippet. No coding required.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('register') }}"
               class="px-8 py-3.5 bg-indigo-600 text-white text-base font-semibold rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                Start for Free
            </a>
            <a href="#how-it-works"
               class="px-8 py-3.5 bg-gray-100 text-gray-700 text-base font-semibold rounded-xl hover:bg-gray-200 transition">
                See How It Works
            </a>
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section id="how-it-works" class="py-24 bg-gray-50 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900">How It Works</h2>
            <p class="text-gray-500 mt-3">Get your AI chatbot live in 3 simple steps</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 text-center hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-2xl mx-auto mb-4">1️⃣</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Create Your Bot</h3>
                <p class="text-gray-500 text-sm">Sign up, create a chatbot, and define its personality with a system prompt.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 text-center hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-2xl mx-auto mb-4">2️⃣</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Copy the Snippet</h3>
                <p class="text-gray-500 text-sm">Get your unique embed snippet from the dashboard — just two lines of code.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 text-center hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-2xl mx-auto mb-4">3️⃣</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Paste & Go Live</h3>
                <p class="text-gray-500 text-sm">Paste the snippet on your website and your AI chatbot is instantly live.</p>
            </div>
        </div>
    </div>
</section>

{{-- FEATURES --}}
<section id="features" class="py-24 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900">Everything You Need</h2>
            <p class="text-gray-500 mt-3">Powerful features to support your visitors 24/7</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach([
                ['🧠', 'Powered by Gemini AI', 'State-of-the-art AI that understands context and gives accurate answers.'],
                ['⚡', 'Instant Setup', 'From signup to live chatbot in under 5 minutes. No developers needed.'],
                ['🎨', 'Fully Customizable', 'Set your bot name, personality, and behavior with a simple prompt.'],
                ['🌍', 'Works Anywhere', 'Embed on any website — WordPress, Shopify, custom HTML, anywhere.'],
                ['💬', 'Conversation History', 'Every conversation is saved so you can review and improve your bot.'],
                ['🔒', 'Secure by Default', 'Each bot has a unique token. Only your site can use your bot.'],
            ] as [$icon, $title, $desc])
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-md hover:-translate-y-1 hover:bg-white transition-all duration-200">
                    <div class="text-3xl mb-4">{{ $icon }}</div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">{{ $title }}</h3>
                    <p class="text-sm text-gray-500">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PRICING --}}
<section id="pricing" class="py-24 bg-gray-50 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900">Simple Pricing</h2>
            <p class="text-gray-500 mt-3">Start free, upgrade when you're ready</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Free</h3>
                <p class="text-gray-500 text-sm mb-6">Perfect for trying WiBot</p>
                <div class="text-4xl font-extrabold text-gray-900 mb-6">$0<span class="text-base font-medium text-gray-400">/mo</span></div>
                <ul class="space-y-3 text-sm text-gray-600 mb-8">
                    <li class="flex items-center gap-2">✅ 1 chatbot</li>
                    <li class="flex items-center gap-2">✅ 100 messages/month</li>
                    <li class="flex items-center gap-2">✅ Embed on 1 website</li>
                    <li class="flex items-center gap-2">✅ Basic analytics</li>
                </ul>
                <a href="{{ route('register') }}"
                   class="block text-center px-5 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition">
                    Get Started
                </a>
            </div>

            <div class="bg-indigo-600 rounded-2xl p-8 border border-indigo-600 shadow-xl relative hover:-translate-y-1 transition-all duration-200">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-amber-400 text-amber-900 text-xs font-bold rounded-full">MOST POPULAR</span>
                <h3 class="text-lg font-bold text-white mb-1">Pro</h3>
                <p class="text-indigo-200 text-sm mb-6">For growing businesses</p>
                <div class="text-4xl font-extrabold text-white mb-6">$19<span class="text-base font-medium text-indigo-300">/mo</span></div>
                <ul class="space-y-3 text-sm text-indigo-100 mb-8">
                    <li class="flex items-center gap-2">✅ 5 chatbots</li>
                    <li class="flex items-center gap-2">✅ Unlimited messages</li>
                    <li class="flex items-center gap-2">✅ Embed on unlimited websites</li>
                    <li class="flex items-center gap-2">✅ Advanced analytics</li>
                    <li class="flex items-center gap-2">✅ Priority support</li>
                </ul>
                <a href="{{ route('register') }}"
                   class="block text-center px-5 py-2.5 bg-white text-indigo-600 font-semibold rounded-xl hover:bg-indigo-50 transition">
                    Get Started
                </a>
            </div>

            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Business</h3>
                <p class="text-gray-500 text-sm mb-6">For teams and agencies</p>
                <div class="text-4xl font-extrabold text-gray-900 mb-6">$49<span class="text-base font-medium text-gray-400">/mo</span></div>
                <ul class="space-y-3 text-sm text-gray-600 mb-8">
                    <li class="flex items-center gap-2">✅ Unlimited chatbots</li>
                    <li class="flex items-center gap-2">✅ Unlimited messages</li>
                    <li class="flex items-center gap-2">✅ White-label option</li>
                    <li class="flex items-center gap-2">✅ API access</li>
                    <li class="flex items-center gap-2">✅ Dedicated support</li>
                </ul>
                <a href="{{ route('register') }}"
                   class="block text-center px-5 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 px-4">
    <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Ready to add AI to your website?</h2>
        <p class="text-gray-500 text-lg mb-8">Join hundreds of businesses using WiBot to support their visitors 24/7.</p>
        <a href="{{ route('register') }}"
           class="inline-block px-8 py-3.5 bg-indigo-600 text-white text-base font-semibold rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
            Get Started for Free
        </a>
    </div>
</section>

{{-- FOOTER --}}
<footer class="border-t border-gray-100 py-8 px-4">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
        <span class="text-indigo-600 font-bold text-lg">WiBot</span>
        <p class="text-sm text-gray-400">© {{ date('Y') }} WiBot. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
