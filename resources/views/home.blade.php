@extends('layout.app')
@section('content')
    @push('explore')
        <div class="row">
            <div class="col-2">
                <h1>Give Your Fashion <br>A New Balance!</h1>
                <p>We serve a retail customer base that continues to grow exponentially, offering products that span various
                    categories including, Clothing, shoes and much more. Our range of services are designed to ensure optimum
                    levels of convenience and customer satisfaction with the retail process; these services include our lowest
                    price guarantee, dedicated customer service support and many other premium services.
                    <br>We are highly customer-centric and are committed towards finding innovative ways of improving our
                    customers' shopping experience with us; For any press related questions, kindly send us an email at using
                    our contact us page.
                </p>
                <a href="{{ route('products') }}" class="btn">Explore Now &#8594;</a>

            </div>
            <div class="col-2">
                <img src="images/image1.png">
            </div>
        </div>
    @endpush
    <div class="categories">
        <div class="small-containers">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('images/category-1.jpg') }}">
                </div>
                <div class="col-3">
                    <img src="{{ asset('images/category-2.jpg') }}">
                </div>

                <div class="col-3">
                    <img src="{{ asset('images/category-3.jpg') }}">
                </div>
            </div>
        </div>
    </div>

    <!------------- Featured Product ---------->

    <div class="small-containers">
        <h1 class="title">Featured Products</h1>
        <div class="row">
            @if (isset($featured_products))
                @foreach ($featured_products as $product)
                    <div class="col-4">
                        <a href="{{ route('product', $product->id) }}">
                            <img src="{{ asset('products_images/'. $product->img->name) }}">
                        </a>
                        <h4>{{ $product->name }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <p><b>₦{{ number_format($product->amount, 2) }}</b> Only</p>
                    </div>
                @endforeach
            @else
            @endif
        </div>
        <h2 class="title">Latest Arrivals</h2>
        <div class="row">
            @if (isset($products))
                @foreach ($products as $index => $product)
                    <div class="col-4">
                        <a href="{{ route('product', $product->id) }}">
                            <img src="{{ asset('products_images/'. $product->img->name) }}">
                        </a>
                        <h4>{{ $product->name }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <p><b>₦{{ number_format($product->amount, 2) }}</b> Only</p>
                    </div>
                @endforeach
            @else
            @endif
        </div>
    </div>


    <!----------Offers--------->
    <div class="offer">
        <div class="small-containers">
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive.png" alt="Exclusive Product" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on Store</p>
                    <h1 clas>Smart Watch First Gen</h1>
                    <small>The Android Phone Wrist Watch is not just stylish but very effective and convenient, more like
                        your Mobile Phone you can as well make and receive calls with Our A1 Smart Wristwatch and do a whole
                        lot. It supports Bluetooth, Mp3, Sim Card and USB. Full Specifications Of The A1 Smart Wristwatch
                        Type: Watch Phone CPU: MTK6261 External memory: Supports Up to 32GB MicroSD.</small><br>
                    <a href="http://127.0.0.1:8000/product/4793673" class="btn"> Buy Now &#128722;</a>
                </div>

            </div>

        </div>

    </div>
    </div>
@endsection
