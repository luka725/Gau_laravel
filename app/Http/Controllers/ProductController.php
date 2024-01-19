<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

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
    public function store(ProductRequest $request){
        $data = $request->validated();

        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
        ]);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
    
            foreach ($images as $uploadedFile) {
                $filename = $uploadedFile->getClientOriginalName();
                $imagePath = $uploadedFile->storeAs('uploads', $filename, 'public');
                $product->images()->create([
                    'file_path' => 'storage/uploads',
                    'file_name' => $filename,
                    'mime_type' => $uploadedFile->getClientMimeType(),
                    'size' => $uploadedFile->getSize(),
                ]);
            }
        }
        return response()->json(['message' => 'Product added successfully'], 201);
    }
    public function showProduct($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product', compact('product'));
    }
}
