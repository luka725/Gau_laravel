<!-- resources/views/home.blade.php -->

@extends('layouts.app')  <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
    <div>
        <h1>Welcome to the Homepage</h1>

        @foreach($categories as $category)
            <div>
                <h2>{{ $category->name }}</h2>

                @foreach($category->products as $product)
                    <div>
                        <p>{{ $product->name }}</p>
                        <!-- Add more product details as needed -->

                        @foreach($product->images as $image)
                            <img src="{{ asset($image->file_path . '/' . $image->file_name) }}" alt="{{ $product->name }}">
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection