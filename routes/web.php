<?php

use App\Http\Controllers\UsersController;
use App\Mail\Account_Confirm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
//Routes généralisées
Route::view('', 'home')->name('home');
Route::get('test',function(){
    Mail::to('melidas913@gmail.com')->send(new Account_Confirm);
});
Route::view('confirm/{token}', 'mails.confirm_account')->where('#^[a-zA-Z0-9]{2}$#', 'token')->name('confirm_link');
Route::get('/login', [UsersController::class, 'login_logup'])->name('login_form');
Route::get('/logup', [UsersController::class, 'login_logup'])->name('logup_form');
Route::post('/login', [UsersController::class, 'verify_form'])->name('login_treat');

//Routes administrateur
Route::group(['prefix' => 'admin'], function () {
});


//Routes apprenant
Route::group(['prefix' => 'apprenant'], function () {
});
