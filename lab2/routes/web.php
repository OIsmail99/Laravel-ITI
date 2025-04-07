<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('/deletedPosts', [PostController::class, 'showDeleted'])->name('posts.soft');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::get("/posts/{post}", [PostController::class, "show"])->name("posts.show");
Route::delete("/posts/{post}", [PostController::class, "delete"])->name("posts.delete");

//comments routes
Route::get('/comments/{post}', [CommentController::class, 'index'])->name('comments.index');
Route::delete('/comments/{comment}', [CommentController::class, 'delete'])->name('comments.delete');
Route::get('/comments/create/{post}', [CommentController::class, 'create'])->name('comments.create');
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
