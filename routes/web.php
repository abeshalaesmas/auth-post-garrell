<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'showregister'])->name('showregister');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showlogin'])->name('showlogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [AuthController::class, 'showdashboard'])->name('showdashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //CREATE
    Route::get('/post',[PostController::class, 'createPost'])->name('createpost');
    Route::post('/post',[PostController::class, 'storePost'])->name('storepost');

    //READ
    Route::get('/showpost',[PostController::class, 'showPost'])->name('showpost');

    //UPDATE
    Route::get('/edit/{id}',[PostController::class, 'editPost'])->name('editpost');
    Route::put('/update/{id}',[PostController::class, 'updatePost'])->name('updatepost');

    //DELETE
    Route::delete('/delpost/{id}',[PostController::class, 'delPost'])->name('delpost');
});