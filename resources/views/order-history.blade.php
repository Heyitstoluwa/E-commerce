@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

        <style>
            a {
                text-decoration: none !important;
            }

            td a b {
                color: black;
                font-size: 16px;
            }

            #MenuItems li a {
                font-weight: 600;
                color: black;
                letter-spacing: 2px;
            }

            @media (min-width: 1200px) {
                .container {
                    max-width: 1330px !important;
                }
            }

            button {
                /* width: 100%; */
                margin-top: 10px;
                padding: 10px;
                border: none;
                border-radius: 30px;
                background: #ff523b;
                color: #fff;
                font-size: 15px;
                font-weight: bold;
            }

            .btn {
                margin: 0px;
            }

            .row {
                display: -webkit-box;
            }

            * {
                box-sizing: content-box !important;
            }

            .card {
                border: none;
            }

            .header {
                background: radial-gradient(#fff, #ffd6d600);
            }

            .form-row {
                width: 100%;
                margin-bottom: 15px
            }

            .side-menu-active,
            .list-group-item-action:hover {
                background-color: black !important;
                color: beige !important;
                border-radius: 8px !important;
            }

            .product-checkout {
                /* margin-top: 2rem; */
                margin-bottom: 2rem;
            }

            .product-checkout .title {
                background: #ff523b;
                border-radius: 15px 15px 0 0;
                padding: 20px;
                margin: 0px;
                color: #f6f6f6;
            }

            th {
                text-align: left;
                padding: 10px;
                color: black;
                background: transparent;
                font-weight: normal;
            }
        </style>
    @endpush
    <!------------Contact Us-------->
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3 col-md-3">
                @include('layout.includes.menu')
            </div>
            @if ($mode == 'ORD')
                <div class="col-lg-8 col-md-8">
                    <div class="product-checkout">
                        <div class="title">
                            <h2 style="font-size: 15px">Order Details</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4>Order Details</h4>
                                <p>Order ID: <b>{{$order->unique_id}}</b></p>
                                <p>Amount: <b class="text-success">₦{{ number_format($order->amount, 2) }}</b></p>
                                <h4>Transaction Details</h4>
                                <p>Status: <button class="btn btn-sm btn-success"><b class="text-capitalize">{{$transaction->status}}</b></button></p>
                                <p>Reference: <b>{{$transaction->reference}}</b></p>

                                <h4>Products</h4>
                                <table class="table table-hover" id="">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th style="width: 10%"></th>
                                            <th>Product</th>
                                            <th>Amount</th>
                                            <th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($order_products)
                                            @foreach ($order_products as $order_product)
                                                <tr>
                                                    <td>{{ $sn++ }}</td>
                                                    <td>
                                                        <div class="class-info">
                                                            <a href="{{ route('product', $order_product->product->id) }}">
                                                            <img
                                                                src="{{ asset('products_images/' . $order_product->product->img->name) }}">
                                                            </a>
                                                            <div>
                                                            {{-- <a href="{{ route('product', $order_product->product->id) }}">
                                                                <p class="p-name">Name: <b>{{$order_product->product->name}}</b></p>
                                                            </a> --}}
                                                                {{-- <small class="small">Price: <b class="text-success">₦{{ number_format($order_product->amount, 2) }}</b></small><br>
                                                                <small class="small">Size: <b>{{$order_product->size}}</b></small> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                            <a href="{{ route('product', $order_product->product->id) }}">
                                                                <b>{{$order_product->product->name}}</b>
                                                            </a>
                                                    </td>
                                                    <td>
                                                      <b class="text-success">₦{{ number_format($order_product->amount, 2) }}</b>
                                                    </td>
                                                    <td>
                                                      {{$order_product->size}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($mode == 'ORR')
                <div class="col-lg-8 col-md-8">
                    <div class="product-checkout">
                        <div class="title">
                            <h2 style="font-size: 15px">My Orders</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover" id="">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Order ID</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($orders)
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $sn++ }}</td>
                                                    <td><a href="{{ route('order', $order->unique_id) }}"><b
                                                                class="text-uppercase">{{ $order->unique_id }}</b></a></td>
                                                    <td><b class="text-success">₦{{ number_format($order->amount, 2) }}</b></td>
                                                    <td>{{ $order->created_at->format('D, M j, Y h:i a') ?? '-' }}</td>
                                                    <td>
                                                        <a href="{{ route('order', $order->unique_id) }}"
                                                            class="btn btn-sm btn-secondary">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
@endsection
