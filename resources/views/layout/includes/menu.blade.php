<div class="product-checkout">
    <div class="title">
        <h2 style="font-size: 15px">Welcome {{ Auth::user()->name }}!</h2>
    </div>
    <div class="card">
        <div class="p-1 pb-3">
            <div class="list-group list-group-transparent mb-0 mail-inbox" style="width: 100%">
                <a href="{{ route('account') }}"
                    class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2 mb-2 mt-1 {{ request()->is('account') ? 'side-menu-active' : '' }}">
                    <i
                        class="fe fe-arrow-right fs-14 me-4 p-1 border-success br-7 bg-success-transparent text-success"></i>
                    My Profile </a> <a href="{{ route('orders') }}"
                    class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2 mb-2 mt-1 {{ request()->is('orders') ? 'side-menu-active' : '' }}">
                    <i
                        class="fe fe-arrow-right fs-14 me-4 p-1 border-primary br-7 bg-primary-transparent text-primary"></i>
                    Order History </a>
                <a href="{{ route('my-carts') }}"
                    class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2 mb-2 mt-1 {{ request()->is('my-carts') ? 'side-menu-active' : '' }}">
                    <i class="fe fe-arrow-right fs-14 me-4 p-1 border-info br-7 bg-info-transparent text-info"></i>
                    My Cart </a>
                <a href="{{ route('password') }}"
                    class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2 mb-2 mt-1 {{ request()->is('change-password') ? 'side-menu-active' : '' }}">
                    <i
                        class="fe fe-arrow-right fs-14 me-4 p-1 border-warning br-7 bg-warning-transparent text-warning"></i>
                    Change Password </a>
                <a href="{{ route('account.logout') }}"
                    class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2 mb-2 mt-1 {{ request()->is('account2') ? 'side-menu-active' : '' }}">
                    <i
                        class="fe fe-arrow-right fs-14 me-4 p-1 border-danger br-7 bg-danger-transparent text-danger"></i>
                    Logout </a>
            </div>
        </div>
    </div>
</div>
