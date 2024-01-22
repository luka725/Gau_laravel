<!-- resources/views/cart/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="/">Back to home</a>
        <h1 class="mb-4">Shopping Cart</h1>

        @if ($cartItems->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>
                                <img src="{{ asset($cartItem->product->images[0]->file_path . '/' . $cartItem->product->images[0]->file_name) }}" alt="{{ $cartItem->product->name }}" width="150" height="150">
                            </td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>${{ $cartItem->product->price }}</td>
                            <td>${{ $cartItem->total_price }}</td>
                            <td>
                                <!-- Delete button with a form for CSRF protection -->
                                <form action="{{ route('cart.removeFromCart', ['product' => $cartItem->product]) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <!-- Update quantity form with a number input and submit button -->
                                <form action="{{ route('cart.updateCartItem') }}" method="post" class="d-inline">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="item_id" value="{{ $cartItem->id }}">
                                    <div class="form-group d-inline">
                                        <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="form-control form-control-sm">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <p class="font-weight-bold">Total Price: ${{ $cartItems->sum('total_price') }}</p>
            </div>

            <div class="mt-4">
                <a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        @else
            <div class="alert alert-info">
                Your cart is empty.
            </div>
        @endif
    </div>
@endsection