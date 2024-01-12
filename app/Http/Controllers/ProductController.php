<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getByCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->select('id', 'name', 'price', 'description', 'category_id')->get();
        return response()->json(['products' => $products], 200);
    }
    public function getAllProduct(){
        $products = Product::all();
        return response()->json(['products' => $products], 200);
    }
    public function getImagesById($productId){
        $product = Product::with('images')->find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json(['images' => $product->images], 200);
    }
}
