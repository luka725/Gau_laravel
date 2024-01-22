<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
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
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function addToCart(Product $product, Request $request)
    {
        $quantity = $request->input('quantity', 1);

        $cart = Cart::where('user_id', auth()->id())->first();

        if (!$cart) {
            $cart = Cart::create(['user_id' => auth()->id()]);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart.');
    }
}
