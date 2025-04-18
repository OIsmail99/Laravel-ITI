<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); //returns the currently authenticated (logged in) user
//auth:sanctum ensures the user is logged in via Laravel Sanctum token-based authentication.

Route::get('posts', [PostController::class, 'index'])->middleware('auth:sanctum');
Route::get('posts/{slug}', [PostController::class, 'show'])->middleware('auth:sanctum');

Route::post('posts', [PostController::class, 'store'])->middleware('auth:sanctum');

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
    echo $user;
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
            'password' => 'incorrect password'
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

