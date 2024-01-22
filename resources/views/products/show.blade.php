<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <!-- Product Image Carousel -->
            <div id="productCarousel{{ $product->id }}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($product->images as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($image->file_path . '/' . $image->file_name) }}" class="d-block w-100" alt="{{ $product->name }}">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#productCarousel{{ $product->id }}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel{{ $product->id }}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Back to Category Button -->
            <a href="{{ route('category.show', ['category' => $product->category_id]) }}" class="btn btn-primary mb-3">Back to Category</a>

            <!-- Product Details -->
            <h2>{{ $product->name }}</h2>
            <p class="lead">{{ $product->description }}</p>
            <p class="font-weight-bold">${{ $product->price }}</p>

            <!-- Add to Cart Form -->
            <form action="{{ route('products.addToCart', ['product' => $product]) }}" method="post" class="mb-3">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" value="1" min="1" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>

            <!-- View Cart Button -->
            <a href="{{ route('cart.index') }}" class="btn btn-info">View Cart</a>
        </div>
    </div>
</div>
@endsection