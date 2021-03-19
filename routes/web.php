<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

//Routes généralisées
Route::view('', 'general.home')->name('home');
Route::get('/login', [AccountController::class, 'login_logup'])->name('login_form');
Route::get('/logup', [AccountController::class, 'login_logup'])->name('logup_form');
Route::post('/login', [AccountController::class, 'verify_form'])->name('login_treat');

Route::get('confirm-email/{token}', [AccountController::class, 'confirm_account'])->where('#^[a-zA-Z0-9]{150}$#', 'token')->name('confirm_link');
//Routes administrateur
Route::group(['prefix' => 'admin'], function () {
    Route::view('home', 'admin.home')->name('admin_home');
});


//Routes apprenant
Route::group(['prefix' => 'apprenant'], function () {
    Route::view('profile', 'apprenant.profile')->name('apprenant_profile');
});
