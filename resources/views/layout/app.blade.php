<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wande Store - {{ $title ?? '' }}</title>

    <!-----------------CSS---------->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    .invalid-feedback {
        display: block !important;
    }

    body {
        /* min-height: 100vh !important; */
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .checkout:hover {
        text-decoration: none;
        background-color: antiquewhite;
        color: black;
    }

    .small {
        font-size: 12px;
    }
    .p-name{
        margin-bottom: 0px;
    }
</style>

<body>
    <!------------- Header ---------->
    @include('layout.includes.header')

    <!--------- Content ----->
    @yield('content')

    @stack('style')
    @stack('script')

    <!---------Testimony Region-------->
    {{-- @include('layout.includes.testimony') --}}

    <!---------Brand Region-------->
    {{-- @include('layout.includes.brand') --}}

    <!---------Footer Region-------->
    @include('layout.includes.footer')
    @include('layout.includes.alert')

    <!-----------------JavaScript---------->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    if (document.getElementById("checkout-amount")) {
        var amount = document.getElementById("checkout-amount").value;
    } else {
        var amount = 0;
    }
    console.log(amount, "amount");

    function payWithPaystack() {
        // e.preventDefault();
        let handler = PaystackPop.setup({
            key: 'pk_test_93253e4094828ef15dfd864b9decb3dfceb75a8f', // Replace with your public key
            // email: document.getElementById("email-address").value,
            // amount: document.getElementById("amount").value * 100,
            email: "{{ Auth::user()->email ?? '' }}",
            amount: parseInt(amount) * 100,
            currency: "NGN",
            ref: 'WDS' + Math.floor((Math.random() * 1000000000) +
                1
            ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            callback: function(response) {
                console.log(response);
                save(amount, response)
                //this happens after the payment is completed successfully
                setTimeout(function() {
                    window.location.href = "{{ route('orders') }}";
                }, 2000);
            },
            onClose: function() {
                // alert('Transaction was not completed, window closed.');
            },
        });

        handler.openIframe();
    }

    function buyWithPaystack(buyAmount) {
        // e.preventDefault();
        let handler = PaystackPop.setup({
            key: 'pk_test_93253e4094828ef15dfd864b9decb3dfceb75a8f', // Replace with your public key
            // email: document.getElementById("email-address").value,
            // amount: document.getElementById("amount").value * 100,
            email: "{{ Auth::user()->email ?? '' }}",
            amount: parseInt(buyAmount) * 100,
            currency: "NGN",
            ref: 'WSD' + Math.floor((Math.random() * 1000000000) +
                1
            ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            callback: function(response) {
                // console.log(response);
                //this happens after the payment is completed successfully
                // save(response)
                // setTimeout(function() {
                //     window.location.reload();
                // }, 2000);
            },
            onClose: function() {
                // alert('Transaction was not completed, window closed.');
            },
        });

        handler.openIframe();
    }

    function save(amount, response) {
        try {
            var allProducts = [0];
            if (document.getElementById("checkout-products")) {
                var allProducts = document.getElementById("checkout-products").value;
                allProducts = JSON.parse(allProducts)
                console.log(allProducts, "parse");
            }

            var url = "{{ route('save-order') }}"

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    allProducts: allProducts,
                    amount: amount,
                    reference: response.reference,
                    status: response.status,
                    trxref: response.trxref,
                },

                success: function(response) {
                    console.log(response);
                    localStorage.clear();
                    return toastr.success("{{ session('success') }}", "Payment Successful");
                },
                error: function(err) {
                    console.log(err);
                    return toastr.error("{{ session('error') }}", "Payment Failed");
                }
            });
        } catch (error) {
            console.log(error);
        }
    }
</script>

</html>
