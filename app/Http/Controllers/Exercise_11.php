<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exercise_11 extends Controller
{
    public function productVisibility(Request $request){
        $request->validate([
            "input" => "required",
            "input.customer" => "required",
            "input.products" => "required|array",
            "input.customer.tags" => "required|array",
            "input.products.*.id" => "required|numeric",
            "input.products.*.allow" => "array",
            "input.products.*.block" => "array",
        ]);

        $input = $request->input('input');
        $customer_tags = $input['customer']['tags'];
        $products = $input['products'];

        $trimTags = [];
        foreach($customer_tags as $tag){
            foreach($products as $product){
                foreach($product['allow'] as $allow){
                    if($tag === $allow){
                        $trimTags["Allowed"][] = $tag;
                        $trimTags["Allowed_id"][] = $product['id'];
                    }
                }
                foreach($product['block'] as $block){
                    if($tag === $block){
                        $trimTags["Blocked"][] = $tag;
                        $trimTags["Blocked_id"][] = $product['id'];
                    }
                }
            }   
        }

        $collection = collect($trimTags["Allowed"]);
        $intersect = $collection->intersect($trimTags["Blocked"]);
        $test = $intersect->all();
        
        if(count($test) > 0){
           return response()->json([
            "success" => false,
            "message"  => "Please Remove the Common Tags from either Allowed or Blocked Tags to Avoid Conflict", 
            "data" => [ "Common Tags" =>  collect($test)->unique()->values()],
            "error" => "Some Products have both Allowed and Blocked Tags"
        ]);
        }
        return response()->json([
            "success" => true,
            "message" => "These Product Will be Visible to the Customer based on their Tags",
            "data" => [ "Allowed_Product_ID" => collect($trimTags["Allowed_id"])->unique()->values()],
            "error" => null
        ]);
    }
}