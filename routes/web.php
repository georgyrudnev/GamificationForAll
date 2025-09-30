<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [App\Http\Controllers\Post::class, 'index'])->name('posts');
Route::get('posts/{id}', [App\Http\Controllers\Post::class, 'show'])->name('posts.show');

// Create, put and delete routes for comments
Route::post('posts/{id}/submit-comment', [App\Http\Controllers\Post::class, 'createComment'])->name('posts.createComment');
Route::put('posts/{id}/{commentId}/edit-comment', [App\Http\Controllers\Post::class, 'updateComment'])->name('posts.updateComment');
Route::delete('posts/{id}/{commentId}/delete-comment', [App\Http\Controllers\Post::class, 'deleteComment'])->name('posts.deleteComment');

Route::get('login-custom', [App\Http\Controllers\Login::class, 'index']);
Route::post('submit-login', [App\Http\Controllers\Login::class, 'login']);


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
