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

            .side-menu-active, .list-group-item-action:hover {
                background-color: black !important;
                color: beige !important;
                border-radius: 8px !important;
            }

                .product-checkout {
                    /* margin-top: 2rem; */
                    margin-bottom: 2rem;
                }

                .product-checkout  .title {
                    background: #ff523b;
                    border-radius: 15px 15px 0 0;
                    padding: 20px;
                    margin: 0px;
                    color: #f6f6f6;
                }
        </style>
    @endpush
    <!------------Contact Us-------->
    <div class="container">
        @auth
            <div class="row mt-5">
                <div class="col-lg-3 col-md-3">
                    @include('layout.includes.menu')
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="product-checkout">
                        <div class="title">
                            <h2 style="font-size: 15px">Profile</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="validate-form" action="{{ route('account') }}" method="POST" enctype="multipart/form-data" style="margin-top: -4rem;">
                                    @csrf
                                    <div class="row mt-5 settings p-2">
                                        {{-- <div class=""> --}}
                                        <div class="form-row">
                                            {{-- <div class=""> --}}
                                            <label class="form-label">Full Name</label>
                                            <input name="name" type="text" class="form-control" required=""
                                                data-parsley-required-message="Full name is required" placeholder="First Name"
                                                value="{{ Auth::user()->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- </div> --}}
                                        </div>

                                        <div class="form-row">
                                            {{-- <div class=""> --}}
                                            <label class="form-label">Email address</label>
                                            <input name="email" type="email" class="form-control" placeholder="Email"
                                                required="" data-parsley-required-message="Email is required"
                                                value="{{ Auth::user()->email }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- </div> --}}
                                        </div>

                                        <div class="form-row">
                                            {{-- <div class="form-group"> --}}
                                            <label class="form-label">Phone Number</label>
                                            <input name="phone" type="number" class="form-control"
                                                placeholder="+234 905 678 234 " value="{{ Auth::user()->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- </div> --}}
                                        </div>

                                        {{-- </div> --}}
                                        <div class="form-row">
                                            {{-- <div class="text-center mt-3"> --}}
                                            <button type="submit" class="btn mt-4 btn-dark pt-2 pt-2"
                                                style="font-size: 18px">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="">

                            {{-- <form action="" method="">
                                <label>
                                    <span class="fname">First Name <span class="required">*</span></span>
                                    <input type="text" name="fname">
                                </label>
                                <label>
                                    <span class="lname">Last Name <span class="required">*</span></span>
                                    <input type="text" name="lname">
                                </label>

                                <label>
                                    <span>Country <span class="required">*</span></span>
                                    <select name="selection">
                                        <option value="select">Select a country...</option>
                                        <option value="AFG">Afghanistan</option>
                                    </select>
                                </label>
                                <label>
                                    <span>Street Address <span class="required">*</span></span>
                                    <input type="text" name="houseadd" placeholder="House number and street name" required>
                                </label>
                                <label>
                                    <span>&nbsp;</span>
                                    <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
                                </label>
                                <label>
                                    <span>Town / City <span class="required">*</span></span>
                                    <input type="text" name="city">
                                </label>
                                <label>
                                    <span>State / County <span class="required">*</span></span>
                                    <input type="text" name="city">
                                </label>
                                <label>
                                    <span>Postcode / ZIP <span class="required">*</span></span>
                                    <input type="text" name="city">
                                </label>
                                <label>
                                    <span>Phone <span class="required">*</span></span>
                                    <input type="tel" name="city">
                                </label>
                                <label>
                                    <span>Email Address <span class="required">*</span></span>
                                    <input type="email" name="city">
                                </label>
                            </form>
                            <div class="Yorder">
                                <table>
                                    <tr>
                                        <th colspan="2">Your order</th>
                                    </tr>
                                    <tr>
                                        <td>Product Name x 2(Qty)</td>
                                        <td>$88.00</td>
                                    </tr>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>$88.00</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>Free shipping</td>
                                    </tr>
                                </table><br>
                                <div>

                                    <input type="radio" name="dbt" value="cd"> Cash on Delivery
                                </div>
                                <div>
                                    <input type="radio" name="dbt" value="cd"> Card Payment <span>
                                        <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg"
                                            alt="" width="50">

                                        <div class="panel-body">
                                            <form role="form">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Card Number</label>
                                                        <div class="input-group">
                                                            <input type="tel" class="form-control"
                                                                placeholder="Valid Card Number" />
                                                            <span class="input-group-addon"><span
                                                                    class="fa fa-credit-card"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Month/Year</span></label>
                                                <input type="tel" class="form-control" placeholder="MM / YY" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>CV Code</label>
                                            <input type="tel" class="form-control" placeholder="CVC" />
                                            <button class="btn-warning btn-lg btn-block">Process payment</button>
                                        </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="" style="min-height:60vh">
                <div class="">
                    <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                        <div class="card2 mb-4">
                            <div class="card-body2">
                                <h2 class="title">Sign In</h2>
                                <form method="POST" action="{{ route('account.login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                                        {{-- <small id="emailHelp" class="form-text text-muted"></small> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <div class="row mt-3">
                                    @if (Route::has('password.request'))
                                        <a class="btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <div class="text-center">
                                        Don't have an accout? <a class=" btn-link p-0 m-0" href="{{ route('register') }}">
                                            {{ __('Create One') }}
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
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
