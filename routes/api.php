<?php

use App\Http\Controllers\Api\WidgetController;
use Illuminate\Support\Facades\Route;

Route::post('/widget/{token}/chat', [WidgetController::class, 'chat']);
