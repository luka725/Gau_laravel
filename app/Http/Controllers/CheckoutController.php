<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Notifications\OrderNotification;

class CheckoutController extends Controller
{
    public function process()
    {
        $user = auth()->user();
        $cartItems = $user->cart->items;

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        // Place logic for processing the order here
        // For example: creating an order record, charging the user, etc.

        // Create a new order
        $order = new Order();
        $order->user_id = $user->id;
        $order->total_amount = $totalAmount;
        $order->save();

        // Create order details for each cart item
        foreach ($cartItems as $cartItem) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cartItem->product_id;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->price = $cartItem->product->price;
            $orderDetail->save();
        }
        $order->user->notify(new OrderNotification($order));
        // Clear the cart after successful order placement
        $user->cart->items()->delete();

        return redirect('/')->with('success', 'Checkout completed successfully. Thank you for your order!');
    }
    public function index()
    {
        $user = auth()->user();
        $cartItems = $user->cart->items;
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('checkout.index', compact('cartItems', 'totalAmount'));
    }
}
