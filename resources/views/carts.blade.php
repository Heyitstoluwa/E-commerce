@extends('layout.app')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('css/product.css') }}">
        <style>
            btn-mmm {
    display: inline-block;
    background: #ff523b;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;
}
</style>
    @endpush
    <!----------Featured Product ---------->
    <h2 class="title">Carts</h2>
    <div class="small-containers cart-page">
        <table class="cart-table" id="data-product">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th> Product </th>
                    <th> Qualtity </th>
                    <th>Subtotal </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="total-price">
            <table>
                <tbody>
                    <tr>
                        <td>Total</td>
                        <td><b style="font-size: 22px" id="totalPrice"></b></td>
                    </tr>

                    </label>

                    </td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn" id="checkout-btn" onclick="payWithPaystack()">Checkout &#128722;</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <input type="hidden" id="checkout-amount" readonly>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // localStorage.clear();
    </script>
@endsection
