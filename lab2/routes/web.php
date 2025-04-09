<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//posts routes
Route::controller(PostController::class)->group(function () {
    Route::middleware(['auth'])->get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::get('/deletedPosts', 'showDeleted')->name('posts.soft');
    Route::post('/posts', 'store')->name('posts.store');
    Route::put('/posts/{post}/restore', 'restore')->name('posts.restore');
    Route::get('/posts/{slug}', 'show')->name('posts.show');
    Route::delete('/posts/{post}', 'delete')->name('posts.delete');
});

//comments routes
Route::controller(CommentController::class)->group(function () {
    Route::get('/comments/{post}', 'index')->name('comments.index');
    Route::delete('/comments/{comment}', 'delete')->name('comments.delete');
    Route::get('/comments/create/{post}', 'create')->name('comments.create');
    Route::post('/comments/{post}', 'store')->name('comments.store');
    Route::get('/comments/{comment}/edit','edit')->name('comments.edit');
    Route::put('/comments/{comment}', 'update')->name('comments.update');
});
