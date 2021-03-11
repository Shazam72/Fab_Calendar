<?php

use Illuminate\Support\Facades\Route;


//Routes généralisées
Route::view('/login','login');

//Routes administrateur
Route::view('/admin','admin.home');
Route::view('admin/notifications','admin.notif')->name('notif_admin');
Route::view('admin/profile','admin.profile')->name('profile_admin');


//Routes apprenant
Route::view('/apprenant','apprenant.home');
Route::view('apprenant/notifications','apprenant.notif')->name('notif_appr');
Route::view('apprenant/profile','apprenant.profile')->name('profile_appr');
