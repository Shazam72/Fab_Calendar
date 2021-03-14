<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


//Routes généralisées
Route::get('/login', [UsersController::class, 'getFormations_login'])->name('login_form');
Route::post('/login', [UsersController::class, 'verify_form'])->name('login_treat');

//Routes administrateur
Route::group(['prefix' => 'admin'], function () {
    
});


//Routes apprenant
Route::group(['prefix' => 'apprenant'], function () {
    
});

