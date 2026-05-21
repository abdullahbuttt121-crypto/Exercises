<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exercise_17 extends Controller
{
    public function shopifyPriceAdjustment(Request $request)
    {
        $request->validate([
            "input" => "required",
            "input.adjustment_value" => "required|numeric",
            "input.price" => "required|array",
            "input.price.*." => "required|array",
        ]);

        $prices = $request->input('input.prices');
        $x = $request->input('input.adjustment_value');


        $flatPrices = [];

        foreach ($prices as $row) {
            foreach ($row as $price) {
                $flatPrices[] = $price;
            }
        }


        $base = $flatPrices[0];

        foreach ($flatPrices as $price) {
            if (abs($price - $base) % $x != 0) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'minimum_operations' => -1
                    ]
                ]);
            }
        }

        sort($flatPrices);

        $n = count($flatPrices);
        $median = $flatPrices[intval($n / 2)];


        $operations = 0;

        foreach ($flatPrices as $price) {
            $operations += abs($price - $median) / $x;
        }

        return response()->json([
            'success' => true,
            'data' => [
                'minimum_operations' => $operations
            ]
        ]);
    }
}
