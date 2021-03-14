<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


//Routes généralisées
Route::view('', 'home')->name('home');
Route::get('/login', [UsersController::class, 'login_logup'])->name('login_form');
Route::get('/logup', [UsersController::class, 'login_logup'])->name('logup_form');
Route::post('/login', [UsersController::class, 'verify_form'])->name('login_treat');

//Routes administrateur
Route::group(['prefix' => 'admin'], function () {
});


//Routes apprenant
Route::group(['prefix' => 'apprenant'], function () {
});
