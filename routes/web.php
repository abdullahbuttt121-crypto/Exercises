<?php

use App\Http\Controllers\Excercise_1;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::post("/exercise-1-artwork-version" , [Excercise_1::class, 'ArtworkVersion'])->name('exercise-1-artwork-version');

require __DIR__.'/auth.php';