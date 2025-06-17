<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('/shop', 'shop')->name('shop');

Route::view('/login', '')->name('login');
Route::view('/register', 'auth.sajili');