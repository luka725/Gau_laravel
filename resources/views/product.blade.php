<!-- resources/views/product.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($product->file_path . '/' . $product->file_name) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <!-- Add more product details as needed -->
            </div>
        </div>
    </div>
@endsection