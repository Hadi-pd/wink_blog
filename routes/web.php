<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index']);
Route::get('/post-{slug}', [BlogController::class, 'show']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('logout',[LoginController::class,'logout']);
Route::middleware(['auth', 'isAdmin'])->group( function () {
    Route::get('admin',[AdminController::class,'index']);
    Route::resource('users', UserController::class);
});
Route::middleware(['auth', 'isUser'])->group( function () {
    Route::get('dashboard',[UserController::class,'index']);
    Route::get('/{user_id}', [UserController::class, 'show']);
    Route::post('/send', [MessageController::class, 'store']);
    Route::post('/block', [UserController::class, 'block']);
    Route::get('/delete/{message}', [MessageController::class, 'destroy']);
    Route::get('remove_block/{user_id}', [UserController::class, 'removeBlock']);
});
