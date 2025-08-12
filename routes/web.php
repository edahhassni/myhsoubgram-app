<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->group(function(){
    Route::get('/', 'index')->name('posts.index');
    Route::get('posts/create', 'create')->name('posts.create');
    Route::post('posts/store', 'store')->name('posts.store');
    Route::get('posts/{post:slug}', 'show')->name('posts.show');
    Route::get('posts/{post:slug}/edit', 'edit')->name('posts.edit');
    Route::put('posts/{post:slug}', 'update')->name('posts.update');
    Route::delete('posts/{post:slug}', 'destroy')->name('posts.destroy');


});
Route::post('/post/{post:slug}/comment', [CommentController::class, 'store'])->name('store_comment');
require __DIR__.'/auth.php';
