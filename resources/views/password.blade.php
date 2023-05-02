@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    margin-bottom: 15px;
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

                .title {
                    background: #ff523b;
                    border-radius: 15px 15px 0 0;
                    padding: 20px;
                    margin: 0px;
                    color: #f6f6f6;
                }
        </style>
    @endpush
    <!------------Change Password-------->
    <div class="container">
        @auth
            <div class="row mt-5">
                <div class="col-lg-3 col-md-3">
                    @include('layout.includes.menu')
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="product-checkout">
                        <div class="title">
                            <h2 style="font-size: 15px">Update Password</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="validate-form" action="{{ route('password') }}" method="POST" style="margin-top: -4rem;">
                                    @csrf
                                    <div class="row mt-5 settings p-2">
                                        <div class="form-row">
                                            <label class="form-label">Current Password</label>
                                            <input name="current_password" type="password" class="form-control" required=""
                                                data-parsley-required-message="Current Password is required" placeholder="*********"
                                                >
                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- </div> --}}
                                        </div>

                                        <div class="form-row">
                                            <label class="form-label">New Password</label>
                                            <input name="new_password" type="password" class="form-control" placeholder="********"
                                                required="" data-parsley-required-message="New Password is required">
                                            @error('new_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- </div> --}}
                                        </div>

                                        <div class="form-row">
                                            {{-- <div class="form-group"> --}}
                                            <label class="form-label">Confirm New Password</label>
                                            <input name="confirm_new_password" type="password" class="form-control"
                                                placeholder="********" >
                                            @error('confirm_new_password')
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
