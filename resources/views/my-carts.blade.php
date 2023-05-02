@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

        <style>
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
            <div class="col-lg-8 col-md-8">
                <div class="product-checkout">
                    <div class="title">
                        <h2 style="font-size: 15px">My Carts</h2>
                    </div>
                    <div class="card" id="reload_me">
                        <div class="card-body">
                            <table class="table table-hover" id="data-product">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th> Product </th>
                                        <th> Qualtity </th>
                                        <th>Subtotal </th>
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
                                            <td><button class="btn checkout" id="checkout-btn" onclick="payWithPaystack()">Checkout &#128722;</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hiddend" id="checkout-amount" readonly>
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
