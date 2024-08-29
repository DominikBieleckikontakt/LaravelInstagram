<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
