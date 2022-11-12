<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website - {{ $title ?? '' }}</title>

    <!-----------------CSS---------->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!------------- Header ---------->
    @include('layout.includes.header')

    <!--------- Content ----->
    @yield('content')

    @stack('style')

    <!---------Testimony Region-------->
    @include('layout.includes.testimony')

    <!---------Brand Region-------->
    @include('layout.includes.brand')

    <!---------Footer Region-------->
    @include('layout.includes.footer')

    <!-----------------JavaScript---------->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>
