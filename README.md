# WiBot 🤖

> AI-powered chat widget platform — embed a smart chatbot on any website in minutes.

![Laravel](https://img.shields.io/badge/Laravel-13-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-blue?style=flat-square&logo=php)
![Livewire](https://img.shields.io/badge/Livewire-4-pink?style=flat-square)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3-38bdf8?style=flat-square&logo=tailwindcss)
![Gemini AI](https://img.shields.io/badge/Gemini-AI-4285F4?style=flat-square&logo=google)

## About

WiBot is a SaaS platform that allows users to create custom AI chatbots and embed them on any website using a simple JavaScript snippet. Each chatbot is powered by Google Gemini AI and can be fully customized with a system prompt.

## Features

- 🤖 Create and manage multiple AI chatbots
- 🧠 Powered by Google Gemini 2.5 Flash
- 📋 Custom system prompts per chatbot
- 🔗 Embed widget on any website with 2 lines of code
- 💬 Conversation history per visitor session
- 📊 Dashboard with statistics
- 🔒 Token-based authentication per chatbot
- ⚡ Rate limiting on API endpoints
- 🎨 Modern UI with Tailwind CSS

## Tech Stack

- **Backend** — Laravel 13, PHP 8.3
- **Frontend** — Livewire 4, Alpine.js, Tailwind CSS
- **AI** — Google Gemini 2.5 Flash API
- **Database** — MySQL
- **Build Tool** — Vite

## Installation
```bash
# Clone the repository
git clone https://github.com/M4X1C11/wibot.git
cd wibot

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure your .env file
# Set DB_* and GEMINI_API_KEY

# Run migrations
php artisan migrate

# Build assets
npm run build

# Start the server
php artisan serve
```

## Environment Variables
```env
APP_NAME=WiBot
DB_CONNECTION=mysql
DB_DATABASE=wibot
GEMINI_API_KEY=''
```

## Usage

1. Register an account
2. Create a chatbot and define its system prompt
3. Copy the embed snippet from the Edit page
4. Paste the snippet on any website before `</body>`

## API

**Body:**
```json
{
  "message": "Hello!",
  "session_id": "unique-session-id"
}
```

**Response:**
```json
{
  "message": "AI response here"
}
```

## License

This project is licensed under the MIT License.

## Author

Built by [Simo Maksić](https://github.com/M4X1C11)
