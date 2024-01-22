<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Notifications\OrderNotification;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $user = Auth::user();

        // Create the order
        $order = new Order([
            'user_id' => $user->id,
            'total_amount' => 0, // You can calculate this based on order details
        ]);
        $order->save();

        // Process each order detail
        foreach ($request->input('order_details') as $detail) {
            $product = Product::find($detail['product_id']);

            // Create the order detail
            $orderDetail = new OrderDetail([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $detail['quantity'],
                'price' => $product->price,
            ]);
            $orderDetail->save();

            // Update the total amount for the order
            $order->total_amount += ($product->price * $detail['quantity']);
            $order->save();
        }

        // Send notification to the user
        $user->notify(new OrderNotification($order));

        return response()->json(['message' => 'Order placed successfully', 'order_id' => $order->id], 201);
    }
    public function userOrders()
    {
        $userOrders = auth()->user()->orders()->with('orderDetails.product')->latest()->get();
        return view('orders.user-orders', compact('userOrders'));
    }
}
