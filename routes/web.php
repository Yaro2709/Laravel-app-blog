<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('view');
Route::get('/category/{category:slug}', [PostController::class, 'byCategory'])->name('by-category');
