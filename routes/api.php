<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exercise_1;
use App\Http\Controllers\Exercise_2;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working 🚀'
    ]);
});

Route::post("/exercise-1-artwork-version" , [Exercise_1::class, 'ArtworkVersion'])->name('exercise-1-artwork-version');
Route::post("/exercise-2-tier-pricing" , [Exercise_2::class, 'PriceSelector'])->name('exercise-2-tier-pricing');