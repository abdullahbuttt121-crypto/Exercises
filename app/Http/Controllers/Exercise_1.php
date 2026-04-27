<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exercise_1 extends Controller
{   
    
    // use App\Http\Controllers\Exercise_1;
    // Route::post("/exercise-1-artwork-version" , [Exercise_1::class, 'ArtworkVersion'])->name('exercise-1-artwork-version');

    public function ArtworkVersion(Request $request) {
        $request->validate([
            'input' => 'required|array',
            'input.*.id' => 'required|integer',
            'input.*.approved' => 'required|boolean',
            'input.*.rejected' => 'required|boolean',
            'input.*.time' => 'required|integer',
        ]);

        $inputs = collect($request->input);
    
        $latestArtwork = $inputs->map(function($item){
            if($item['approved'] && !$item['rejected']) {
                return $item;
            }
        })->filter()->values()->sortByDesc('time')->first();

        if($latestArtwork){
            return response()->json([
                'success' => true,
                'data' => ['id' => $latestArtwork['id']],
                'error' => null,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No Valid Input Found',
                'error' => null,
            ]);
        }
    }

}
