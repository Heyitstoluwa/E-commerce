@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
        <style>
            .header {
                background: radial-gradient(#fff, #ffd6d600);
            }
            .content{
                margin-bottom: 3rem
            }
        </style>
    @endpush
    <!------------Contact Us-------->
    <h2 class="title">Contact Us</h2>
    <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">LAUTECH NIGERIA</div>

                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+234W AND E STORE </div>

                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">WANDE@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>Kindly contact us for any enquiry</p>
                <form action="#">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Enter your email">
                    </div>
                    <div class="input-box message-box">
                        <input type="text" placeholder="Your Message">
                    </div>
                    <div class="button">
                        <input type="button" value="Send Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
