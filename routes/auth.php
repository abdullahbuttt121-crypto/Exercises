<?php

use Illuminate\Support\Facades\Route;

Route::inertia('login', 'Auth/Login')->name('login');
Route::inertia('register', 'Auth/Register')->name('register');