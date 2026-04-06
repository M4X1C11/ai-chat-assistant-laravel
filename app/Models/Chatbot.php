<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Chatbot extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'system_prompt',
        'token',
        'is_active'
    ];

    protected static function booted(): void
    {
        static::creating(function ($chatbot) {
            $chatbot->token = Str::random(32);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
