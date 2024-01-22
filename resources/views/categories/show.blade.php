<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container margin-top">
    <a href="/">Back to Home</a>
        <h2 class="my-4">{{ $category->name }}</h2>
        <div class="row">
            @foreach ($category->products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($product->images[0]->file_path . '/' . $product->images[0]->file_name) }}" class="card-img-top" alt="{{ $product->name }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">${{ $product->price }}</p>
                            <a href="{{ route('product.show', ['product' => $product]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection