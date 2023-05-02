@extends('layout.app')

@section('content')
    <style>
        label {
            font-size: 16px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .btn-link {
            text-decoration: none
        }

        .card {
            border: 0px;
            border-radius: 15px;
            box-shadow: rgb(0 0 0 / 30%) 0px 19px 38px, rgb(0 0 0 / 22%) 0px 15px 12px;
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
            top: 40%
        }

        h4 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 700;
            font-size: 25px;
        }

        .form-control {
            height: 50 px;
            padding: 10px;
            font-size: 16px;
            color: gray !important;
            font-weight: 600;
            background-color: #f0f4f9;
            border: 1px solid #eee;
            border-radius: 3px;
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

        * {
            box-sizing: content-box !important;
        }

        .header {
            background: radial-gradient(#fff, #ffd6d600);
        }
    </style>
    <style>
        .title::after {
            content: "";
            background: #ff523b;
            width: 58px;
            height: 5px;
            border-radius: 5px;
            position: absolute;
            bottom: 0;
            left: 58%;
            transform: translateX(-50px);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .form-control {
            display: block;
            width: -webkit-fill-available;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .card {
            border: 0px;
            border-radius: 15px;
            box-shadow: rgb(0 0 0 / 30%) 0px 19px 38px, rgb(0 0 0 / 22%) 0px 15px 12px;
            margin: 0 auto;
            /* Added */
            float: none;
            padding: 15px;
            /* Added */
            /* margin-bottom: 10px; */
            /* Added */
            top: 30%;
            margin-top: 30%;
            margin-bottom: 80%;
            /* text-align: center */
        }

        .center {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            width: 30%
        }
        .mt-5{
            margin-bottom: 10%;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="text-center mt-5">
                        <h4>Reset Password</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-12 offset-md-0 mt-3 mb-2">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
