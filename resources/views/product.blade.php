@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    @endpush
    @push('script')
        <script>
            var productImg = document.getElementById("ProductImg");
            var SmallImg = document.getElementsByClassName("small-img");
            SmallImg[0].onclick = function() {
                productImg.src = SmallImg[0].src;
            };

            SmallImg[1].onclick = function() {
                productImg.src = SmallImg[1].src;
            };
            SmallImg[2].onclick = function() {
                productImg.src = SmallImg[2].src;
            };
            SmallImg[3].onclick = function() {
                productImg.src = SmallImg[3].src;
            };
        </script>
    @endpush
    <!----------Featured Product ---------->
    <h2 class="title">All Products</h2>

    <!------------- Featured Product ---------->
    <div class="small-containers single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('products_images/' . $product->img->name) }}" alt="{{ $product->name }}" width="100%"
                    id="ProductImg">
                <div class="small-img-row">
                    @isset($images)
                        @foreach ($images as $image)
                            <div class="small-img-col">
                                <img src="{{ asset('products_images/' . $image->name) }}" alt="{{ $product->name }}"
                                    width="100%" class="small-img">
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
            <div class="col-2">
                <p> Home / {{ $product->name ?? '' }}</p>
                <h1>{{ $product->name ?? '' }}
                </h1>
                <h4><b>₦{{ number_format($product->amount ?? 0, 2) }}</b>
                </h4>
                {{-- <div class="buttons">
                    <span class="like-btn"></span>
                </div> --}}
                <select id="productSize">
                    <option value="none">Select Product Size </option>
                    @isset($product->size)
                        @foreach ($product->size as $size)
                            <option>{{ $size }}</option>
                        @endforeach
                    @endisset
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
                <span id="toCartTextError"></span>
                {{-- <input type="number" value="1"> --}}
                <input type="hidden" value="{{ $product->quantity ?? 0 }}" name="quantity" id="quantity">
                <input type="hidden" value="{{ $product->amount ?? 0 }}" name="price" id="price">
                <input type="hidden" value="{{ $product->name ?? '' }}" name="productName" id="productName">
                <input type="hidden" value="{{ $product->img->name ?? '' }}" name="productImage" id="productImage">
                <div class="btn-group">
                    <a href="#" id="addCart" onclick="addToCart({{ $product->id ?? 0 }})" class="btn">Add
                        Cart</a>
                    <a href="" class="btn">Buy Now</a>
                </div>
                <h3>Product Details<i class="fa fa-indent"></i></h3>
                <br>
                <p>
                    {{ $product->details ?? '' }}
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
            @if (isset($random_products))
                @foreach ($random_products as $index => $value)
                    @continue($loop->index == -1)
                    <div class="col-4">
                        <a href="{{ route('product', $value->id) }}">
                            <img src="{{ asset('products_images/' . $value->img->name) }}">
                        </a>
                        <h4>{{ $value['name'] }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <p><b>₦{{ number_format($value->amount, 2) }}</b> Only</p>
                    </div>
                    @break($loop->index == 3)
                @endforeach
            @else
            @endif
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
