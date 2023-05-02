@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('css/product.css') }}">
        <style>
            .btn-group button:not(:last-child) {
                border-right: none;
                /* Prevent double borders */
            }

            /* Clear floats (clearfix hack) */
            .btn-group:after {
                content: "";
                clear: both;
                display: table;
            }

            /* Add a background color on hover */
            .btn-group button:hover {
                background-color: #3e8e41;
            }

            #toCartText {
                font-size: 12px;
                color: green;
                font-weight: 600;
                letter-spacing: 2px;
            }

            .badge {
                padding-left: 9px;
                padding-right: 9px;
                -webkit-border-radius: 9px;
                -moz-border-radius: 9px;
                border-radius: 9px;
            }

            .label-warning[href],
            .badge-warning[href] {
                background-color: #c67605;
            }

            #lblCartCount {
                font-size: 14px;
                font-weight: 400;
                letter-spacing: 1px;
                background: green;
                color: #fff;
                padding: 0 5px;
                vertical-align: top;
                margin-left: -10px;
            }
        </style>
    @endpush
    <!----------Featured Product ---------->
    <h2 class="title">All Products</h2>

    <!------------- Featured Product ---------->
    <div class="small-containers single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{ $product[0]['images'][0] ?? '' }}" width="100%" id="ProductImg">
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="{{ $product[0]['images'][0] ?? '' }}" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ $product[0]['images'][1] ?? '' }}" width="100%" class="small-img">

                    </div>
                    <div class="small-img-col">
                        <img src="{{ $product[0]['images'][2] ?? '' }}" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ $product[0]['images'][3] ?? '' }}" width="100%" class="small-img">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <p> Home / {{ $product[0]['name'] ?? '' }}</p>
                <h1>{{ $product[0]['name'] ?? '' }}
                </h1>
                <h4><b>₦{{ number_format($product[0]['price'], 2) }}</b>
                </h4>
                {{-- <div class="buttons">
                    <span class="like-btn"></span>
                </div> --}}
                <select>
                    <option>Select Product Size </option>
                    @if ($product[0]['size'])
                        @foreach ($product[0]['size'] as $size)
                            <option>{{ $size }}</option>
                        @endforeach
                    @endif
                </select>
                <div class="quantity">
                    <button class="plus-btn" type="button" name="button">
                        <img src="plus.svg" alt="">+
                    </button>
                    <input type="text" name="productQuantity" id="productQuantity" value="1">
                    <button class="minus-btn" type="button" name="button">
                        <img src="minus.svg" alt="">-
                    </button>
                </div>
                <span id="toCartText"></span>
                {{-- <input type="number" value="1"> --}}
                <input type="hidden" value="{{ $product[0]['quantity'] }}" name="quantity" id="quantity">
                <input type="hidden" value="{{ $product[0]['price'] }}" name="price" id="price">
                <input type="hidden" value="{{ $product[0]['name'] }}" name="productName" id="productName">
                <input type="hidden" value="{{ $product[0]['images'][0] }}" name="productImage" id="productImage">
                <div class="btn-group">
                    <a href="#" id="addCart" onclick="addToCart({{ $product[0]['id'] }})" class="btn">Add
                        Cart</a>
                    <a href="" class="btn">Buy Now</a>
                </div>
                <h3>Product Details<i class="fa fa-indent"></i></h3>
                <br>
                <p>
                    {{ $product[0]['details'] ?? '' }}
                </p>
                </select>
            </div>
        </div>
    </div>


    <div class="small-containers">
        <div class="row row-2">
            <h2 class="title">Related Products</h2>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
