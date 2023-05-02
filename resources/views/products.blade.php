@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    @endpush
    <!----------Featured Product ---------->
    <h2 class="title">All Products</h2>
    <div class="small-containers">
        {{-- <div class="product-sorting">
            <div class="row-2">
                <select>
                    <option>Default Sorting</option>
                    <option>Sort by Size</option>
                    <option>Sort by Popularity</option>
                    <option>Sort by Rating</option>
                    <option>Sort by Sales</option>
                </select>
            </div>
        </div> --}}


        <div class="row">
            @if (isset($products))
                @foreach ($products as $product)
                    <div class="col-4">
                        <a href="{{ route('product', $product->id) }}">
                            <img src="{{ asset('products_images/' . $product->img->name) }}" alt="{{$product->name}}">
                        </a>
                        <h4>{{ $product['name'] }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <p><b>₦{{ number_format($product['amount'], 2) }}</b> Only</p>
                    </div>
                @endforeach
            @else
            @endif
        </div>
       {{ $products->links() }}  
    </div>
@endsection
