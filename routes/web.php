<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprenantController;
use Illuminate\Support\Facades\Route;

// Route::get('test', function () {
//     $user = new ApprenantController();
//     dd($user->oneWeekParam());
// });


//Routes généralisées
Route::view('', 'general.home')->name('home');
Route::view('contact', 'general.contact')->name('contact');
Route::get('/login', [AccountController::class, 'login_logup'])->name('login_form');
Route::get('/logup', [AccountController::class, 'login_logup'])->name('logup_form');
Route::post('/login', [AccountController::class, 'verify_form'])->name('login_treat');
Route::post('/logup', [AccountController::class, 'verify_form'])->name('logup_treat');
Route::get('/modifier-info', [AccountController::class, 'login_logup'])->name('modify_info');
Route::post('/modifier-info', [AccountController::class, 'verify_form'])->name('modify_treat');
Route::get('confirm-email/{token}', [AccountController::class, 'confirm_account'])->where('#^[a-zA-Z0-9]{150}$#', 'token')->name('confirm_link');





//Routes administrateur
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('home', [AdminController::class, 'home'])->name('admin_home');
        Route::view('profile', 'admin.profile')->name('admin_profile');
        Route::post('home', [AdminController::class, 'param']);

        Route::post('account_validation/{id}', [AdminController::class, 'handleAccount'])->name('account_validation');
        Route::post('account_refuse/{id}', [AdminController::class, 'handleAccount'])->name('account_refuse');


        Route::get('disconnect', [AdminController::class, 'disconnect'])->name('admin_disconnect');
    });
    Route::get('', [AccountController::class, 'existAdmin'])->name('existAdmin');
    Route::post('', [AccountController::class, 'verify_form'])->name('admin_treat');
});






//Routes apprenant
Route::group(['prefix' => 'apprenant', 'middleware' => 'auth'], function () {
    Route::view('profile', 'apprenant.profile')->name('apprenant_profile');
    Route::get('disconnect', [ApprenantController::class, 'disconnect'])->name('apprenant_disconnect');
    Route::get('home', [ApprenantController::class, 'home'])->name('apprenant_home');
    Route::post('reserve', [ApprenantController::class, 'reserve'])->name('reserve');
    Route::post('cancel', [ApprenantController::class, 'cancel'])->name('cancel_res');
});
