<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Exercise_1;
    
Route::post("/exercise-1-artwork-version" , [Exercise_1::class, 'ArtworkVersion'])->name('exercise-1-artwork-version');