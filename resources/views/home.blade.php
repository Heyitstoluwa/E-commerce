@extends('layout.app')
@section('content')
    @push('explore')
        <div class="row">
            <div class="col-2">
                <h1>Give Your Feet <br>A New Balance!</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Sapien eget mi proin sed libero enim sed faucibus. Rhoncus est
                    pellentesque elit ullamcorper dignissim cras. Laoreet non curabitur gravida arcu ac tortor
                    dignissim convallis. Pulvinar elementum integer enim neque. A iaculis at erat pellentesque
                    adipiscing commodo elit at imperdiet.</p>
                <a href="products.html" class="btn">Explore Now &#8594;</a>

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
            <div class="col-4">
                <a href="product1.html">
                    <img src="images/product-1.jpg">
                </a>
                <h4>Red Printed T-Shirt</h4>

                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>

                </div>
                <p>₦3,999 Only</p>
            </div>
            <div class="col-4">
                <a href="product2.html">
                    <img src="images/product-2.jpg">
                </a>
                <h4>Kinetix Sneaker Shoes</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>₦7,000 Only</p>
            </div>


            <div class="col-4">
                <a href="product3.html">
                    <img src="images/product-3.jpg">
                </a>
                <h4>Male Joggers Ash</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>₦5,999 Only</p>
            </div>

            <div class="col-4">
                <a href="product4.html">
                    <img src="images/product-4.jpg">
                </a>
                <h4>Blue T Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>

                </div>
                <p>₦9,999 Only</p>
            </div>
        </div>
        <h2 class="title">Latest Arrivals</h2>
        <div class="row">
            @if (isset($products))
                @foreach ($products as $product)
                    <div class="col-4">
                        <a href="{{ route('product', $product['id']) }}">
                            <img src="{{ $product['images'][0] }}">
                        </a>
                        <h4>{{ $product['name'] }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <p><b>₦{{ number_format($product['price'], 2) }}</b> Only</p>
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
                    <h1 clas> Smart man dem</h1>
                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Sapien eget mi proin sed libero enim sed faucibus.</small><br>
                    <a href="" class="btn"> Buy Now &#128722;</a>
                </div>

            </div>

        </div>

    </div>
    </div>
@endsection
