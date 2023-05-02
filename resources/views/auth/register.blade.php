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

        .header {
            background: radial-gradient(#fff, #ffd6d600);
        }

        h4 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 700;
            font-size: 25px;
        }

        .form-control {
            height: 40px;
            padding: 10px;
            font-size: 16px;
            color: gray !important;
            font-weight: 600;
            background-color: #f0f4f9;
            border: 1px solid #eee;
            border-radius: 3px;
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
            margin-top: 5%;
            margin-bottom: 20%;
            /* text-align: center */
        }

        .mt-5{
            margin-bottom: 10%;
        }

        .center {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            width: 50%
        }

        .mt-5 {
            text-align: center;
            margin-bottom: 6%;
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

    </style>
    <div class="container">
        <div class="center">
            <div class="col-md-5">
                <div class="card">
                    <div class="text-center mt-5">
                        <h4>Sign Up</h4>
                    </div>
                    <div class="card-body mb-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" requiredd autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Register') }}
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
