<!-- resources/views/checkout/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Checkout</h1>

        <!-- Order Summary -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">Order Summary</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td>{{ $cartItem->product->name }}</td>
                                <td>{{ $cartItem->quantity }}</td>
                                <td>${{ $cartItem->product->price }}</td>
                                <td>${{ $cartItem->total_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-end font-weight-bold">
                    Total: ${{ $totalAmount }}
                </div>
            </div>
        </div>

        <!-- Checkout Form -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shipping Information</h4>

                <!-- Add your checkout form elements here -->
                <form action="{{ route('checkout.process') }}" method="post">
                    @csrf

                    <!-- Add form fields such as name, address, etc. -->

                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>
@endsection