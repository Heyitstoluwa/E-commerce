@extends('layouts/dashboard/app')
@section('content')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .sub-btn {
            margin-top: 3rem;
        }

        .sub-card {
            background-color: #F0F4F9
        }

        .tabs-menu-body {
            border: 0px
        }

        .richText .richText-editor {
            height: 55vh;
        }

        .richText .richText-editor:focus {
            border: 0 none #FFF !important;
            overflow: hidden !important;
            outline: none !important;
        }

        .slow .toggle-group {
            transition: left 0.7s;
            -webkit-transition: left 0.7s;
        }

        .fast .toggle-group {
            transition: left 0.1s;
            -webkit-transition: left 0.1s;
        }

        .quick .toggle-group {
            transition: none;
            -webkit-transition: none;
        }

        .toggle.btn {
            min-width: 5.2rem;
        }
    </style>
    <div class="main-container container-fluid px-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-6">
                    <div class="panel panel-primary">
                        <div class=" tab-menu-heading p-0 bg-white">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class=""><a href="#myProfile"
                                            class="{{ empty(old('tabName')) || old('tabName') == 'myProfile' ? 'active' : '' }}">Profile</a>
                                    </li>
                                    <li><a href="#general"
                                            class="{{ !empty(old('tabName')) && old('tabName') == 'general' ? 'active' : '' }}">Update Password</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="panel-body tabs-menu-body"> --}}
                        <div class="tab-content">
                            <div class="tab-pane {{ empty(old('tabName')) || old('tabName') == 'myProfile' ? 'active' : '' }}"
                                id="myProfile">
                                <div class="row pt-4 mt-3">
                                    <form class="validate-form" action="{{ route('admin.profile') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="box-widget widget-user">
                                                <div class="widget-user-image1 d-xl-flex d-block">
                                                    <img alt="User Avatar" class="avatar brround p-0"
                                                        src="{{ asset(Auth::user()->profile_pics->url ?? 'assets/dashboard/images/photos/22.jpg') }}">
                                                    <div style="display: table">
                                                        <div class="mt-1 ms-xl-5 add-new-member">
                                                            <label class="btn btn-sm btn-primary m-3">
                                                                <input name="avatar" accept="image/*"
                                                                    type="file" />Upload</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-5 settings">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Full Name</label>
                                                        <input name="name" type="text" class="form-control"
                                                            required=""
                                                            data-parsley-required-message="Full name is required"
                                                            placeholder="First Name" value="{{ Auth::user()->name }}">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Email address</label>
                                                        <input name="email" type="email" class="form-control"
                                                            placeholder="Email" required=""
                                                            data-parsley-required-message="Email is required"
                                                            value="{{ Auth::user()->email }}">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone Number</label>
                                                        <input name="phone" type="number" class="form-control"
                                                            placeholder="+234 905 678 234 "
                                                            value="{{ Auth::user()->phone }}">
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-sm-12 col-md-12 mb-4">
                                                    <label class='form-label'>Gender</label>
                                                    <div class='d-flex' style='margin-bottom:-10px'>
                                                        <div class='form-check form-check-inline'>
                                                            <input class='form-check-input' name='gender' type='radio'
                                                                id='inlineCheckbox1' value='male' required=''
                                                                {{ Auth::user()->gender == 'male' ? 'checked' : '' }}
                                                                data-parsley-errors-container='#gender-error'
                                                                data-parsley-required-message='Status is required'>
                                                            <label class='form-check-label'
                                                                for='inlineCheckbox1'>Male</label>
                                                        </div>
                                                        <div class='form-check form-check-inline'>
                                                            <input class='form-check-input'
                                                                {{ Auth::user()->gender == 'female' ? 'checked' : '' }}
                                                                name='gender' type='radio' id='inlineCheckbox2'
                                                                value='female'>
                                                            <label class='form-check-label'
                                                                for='inlineCheckbox2'>Female</label>
                                                        </div>
                                                        <div class='form-check form-check-inline'>
                                                            <input class='form-check-input'
                                                                {{ Auth::user()->gender == 'entity' ? 'checked' : '' }}
                                                                name='gender' type='radio' id='inlineCheckbox3'
                                                                value='entity'>
                                                            <label class='form-check-label'
                                                                for='inlineCheckbox3'>Entity</label>
                                                        </div>
                                                    </div>
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class='invalid-feedback' id='gender-error'
                                                        role='alert'></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12 text-center">
                                                <button class="btn btn-primary p-3 pt-2 pt-2"
                                                    style="font-size: 18px">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane {{ !empty(old('tabName')) && old('tabName') == 'general' ? 'active' : '' }}"
                                id="general">
                                <div class="row pt-4 mt-3">
                                    <div class="row mt-5 settings">
                                        <form method="POST" class="general-settings-form" action="{{ route('admin.password') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Current Password</label>
                                                        <input name="current_password" type="password" class="form-control"
                                                            placeholder="********" required=""
                                                            data-parsley-required-message="Confirm Password is required">
                                                        @error('current_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">New Password</label>
                                                        <input name="new_password" type="password" class="form-control"
                                                            placeholder="********" required=""
                                                            data-parsley-required-message="New Password is required">
                                                        @error('new_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input name="confirm_new_password" type="password" class="form-control"
                                                            placeholder="********" required=""
                                                            data-parsley-required-message="Confirm Password is required">
                                                        @error('confirm_new_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-xl-12 text-center mt-4">
                                                    <button class="btn btn-primary p-3 pt-2 pt-2"
                                                        style="font-size: 18px">Update</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
            $("#submitAboutUs").click(function() {
                $("#about_us_edit").val($(".ql-editor").html());
            });

            

    $(function() {
        $('.general-settings-form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
    });
        </script>
@endsection
