<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('/shop', 'shop')->name('shop');

Route::view('/login', 'auth.ingia')->name('login');
Route::view('/reset', 'auth.ingia')->name('password.request');
Route::view('/register', 'auth.sajili')->name('register');