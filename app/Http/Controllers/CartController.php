<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
        
            if ($cartItems = $user->cart->items) {
                return view('cart.index', compact('cartItems'));
            }
        }
        return redirect()->route('register')->with('info', 'You need to be logged in to access the cart.');
    }

    public function addToCart(Product $product, Request $request)
    {
        $quantity = $request->input('quantity', 1);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'attributes' => [],
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function updateCartItem(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            // Assuming your User model has a relationship with the cart
            $cart = $user->cart;

            if ($cart) {
                $data = $request->validate([
                    'item_id' => 'required|exists:cart_items,id',
                    'quantity' => 'required|integer|min:1',
                ]);

                // Update the quantity of the specified item in the cart
                $cart->items()->where('id', $data['item_id'])->update([
                    'quantity' => $data['quantity'],
                ]);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }
    public function removeFromCart(Product $product)
    {
        $user = auth()->user();

        if ($user) {
            // Assuming your User model has a relationship with the cart
            $cart = $user->cart;

            if ($cart) {
                // Remove the item from the cart based on the product
                $cart->items()->where('product_id', $product->id)->delete();
            }
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
