<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/QW.png') }}" alt="Logo" width="125px">
                </a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a class="{{ request()->is('home') || request()->is('/') ? 'active active-now' : '' }}"
                            href="{{ route('home') }}">Home</a></li>
                    <li><a class="{{ request()->is('products') || request()->is('product/*') || request()->is('carts') ? 'active active-now' : '' }}"
                            href="{{ route('products') }}">Products</a></li>
                    <li><a class="{{ request()->is('about-us') ? 'active active-now' : '' }}"
                            href="{{ route('about') }}">About</a></li>
                    <li><a class="{{ request()->is('contact-us') ? 'active active-now' : '' }}"
                            href="{{ route('contact') }}">Contact</a></li>
                    <li><a class="{{ request()->is('account') || request()->is('my-orders') || request()->is('my-carts') || request()->is('change-password') ? 'active active-now' : '' }}"
                            href="{{ route('account') }}">Account</a></li>
                    @auth
                        <li><a class="{{ request()->is('account.logout') ? 'active active-now' : '' }}"
                                href="{{ route('account.logout') }}">Logout</a></li>
                    @endauth
                </ul>
            </nav>
            <a href="{{ route('carts') }}">
                <img id="cartList" src="{{ asset('images/cart.png') }}" width="30px" height="30px">
                <span class='badge badge-warning' id='lblCartCount'>0</span>
            </a>
            <img src="{{ asset('images/menu.png') }}" class="menu-icon" onclick="menutoggle()">
        </div>
        @stack('explore')
    </div>
</div>
