@extends('layouts.app')

@section('content')
    <style>
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
            top: 30%
        }

        h4 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 700;
            font-size: 25px;
        }

        label {
            font-size: 16px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
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
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-md-4">
                <div class="card">
                    <div class="text-center mt-4">
                        <h4>Sign In</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center mt-0 mb-4">
                            <img src="{{ asset('images/QW.png') }}" alt="Logo" width="125px">
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
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
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" requiredd
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                            </div>

                            <div class="row mb-0">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="text-center">
                                    Don't have an accout? <a class="btn btn-link p-0 m-0" href="{{ route('register') }}">
                                        {{ __('Create One') }}
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
