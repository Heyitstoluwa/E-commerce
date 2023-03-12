@extends('layouts.app')

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
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="text-center mt-4">
                        <h4>Sign In</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center mt-0 mb-4">
                            <img src="{{ asset('images/QW.png') }}" alt="Logo" width="125px">
                        </div>
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
