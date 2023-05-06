@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('css/product.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            a {
                text-decoration: none !important;
            }

            #MenuItems li a {
                text-decoration: none;
                font-weight: 600;
                color: black;
                letter-spacing: 2px;
            }

            @media (min-width: 1200px) {
                .container {
                    max-width: 1330px !important;
                }
            }

            btn-mmm {
                display: inline-block;
                background: #ff523b;
                color: #fff;
                padding: 8px 30px;
                margin: 30px 0;
                border-radius: 30px;
                transition: background 0.5s;
            }

            .small-containers {
                max-width: 80%;
                margin: 0px;
                align-content: center
            }
        </style>
    @endpush
    <!----------Featured Product ---------->
    <div class="container">
        <h2 class="title">Carts</h2>
        <div class="row">
            <div class="col-xl-8">

                <table class="cart-table" id="data-product">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Product</th>
                            <th>Qualtity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="total-price">
                    <table>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                <td><b style="font-size: 22px" id="totalPrice"></b></td>
                            </tr>

                            </label>

                            </td>
                            </tr>
                            <tr>
                                <td>
                                    @auth
                                        <button type="button" class="btn" id="checkout-btn" onclick="payWithPaystack()">Checkout
                                            &#128722;</button>
                                    @else
                                        <a style="cursor: no-drop" class="btn" onclick="alert('Sign in to proceed')"
                                            id="checkout-btn">Checkout &#128722;</a>
                                    @endauth
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="checkout-products" readonly>
    <input type="hidden" id="checkout-amount" readonly>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // localStorage.clear();
    </script>
@endsection
