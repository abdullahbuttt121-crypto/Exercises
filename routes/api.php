<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exercise_1;
use App\Http\Controllers\Exercise_2;
use App\Http\Controllers\Exercise_3;
use App\Http\Controllers\Exercise_4;
use App\Http\Controllers\Exercise_5;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working 🚀'
    ]);
});

Route::post("/exercise-1-artwork-version" , [Exercise_1::class, 'ArtworkVersion']);
Route::post("/exercise-2-tier-pricing" , [Exercise_2::class, 'PriceSelector']);
Route::post("/exercise-3-cart-validator" , [Exercise_3::class, 'cartValidator']);
Route::post("/exercise-4-vendor-allocation" , [Exercise_4::class, 'vendorAllocation']);
Route::post("/exercise-5-discount", [Exercise_5::class , "discountCalculator"]);
