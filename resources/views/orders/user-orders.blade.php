<!-- resources/views/orders/user-orders.blade.php -->

@extends('layouts.app')


@section('content')
    <div class="container margin-top">
    <a href="/" >Back to Home</a>
        <h1>Your Orders</h1>

        @if($userOrders->isEmpty())
            <p>You haven't placed any orders yet.</p>
        @else
            <ul class="list-group">
                @foreach($userOrders as $order)
                    <li class="list-group-item mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Order ID: {{ $order->id }}</h5>
                            <small>{{ $order->created_at->toFormattedDateString() }}</small>
                        </div>
                        <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
                        <ul class="list-group">
                            @foreach($order->orderDetails as $orderDetail)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>{{ $orderDetail->product->name }}</span>
                                        <span>Quantity: {{ $orderDetail->quantity }}</span>
                                        <span>Price: ${{ $orderDetail->price }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection