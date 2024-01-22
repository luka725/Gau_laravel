<!-- Example in the products.blade.php file -->

@foreach($products as $product)
    <a href="{{ url('/products', $product->id) }}">
        <img src="{{ asset($product->file_path . '/' . $product->file_name) }}" alt="{{ $product->name }}">
        <h3>{{ $product->name }}</h3>
    </a>
@endforeach