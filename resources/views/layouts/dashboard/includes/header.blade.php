<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <div class="app-sidebar__toggle d-flex align-items-center" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);"> <svg xmlns="http://www.w3.org/2000/svg"
                        class="feather feather-align-left header-icon" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                    </svg> </a>
            </div>
            <div class="mt-1 d-md-block d-none">
                <div class="form-inline">
                    <div class="search-element">
                        @if (request()->is('user/library'))
                            <form action="" method="GET">
                                <input type="search" name="search" class="form-control header-search mobile-view-search"
                                    placeholder="Search Library" aria-label="Search" tabindex="1">
                                <button class="btn btn-primary-color">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon search-icon"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        @endif
                        @if (request()->is('user'))
                            <form action="" method="GET">
                                <input type="search" name="search" class="form-control header-search mobile-view-search"
                                    placeholder="Search Bookstore" aria-label="Search" tabindex="1">
                                <button class="btn btn-primary-color">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon search-icon"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex order-lg-2 ms-auto main-header-end"><button
                    class="navbar-toggler navresponsive-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="true" aria-label="Toggle navigation"> <i
                        class="fe fe-more-vertical header-icons navbar-toggler-icon"></i> </button>
                <div class="navbar navbar-expand-lg navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <div class="dropdown country-selector d-flex"> <a href="javascript:void(0);"
                                    class="nav-link leading-none" data-bs-toggle="dropdown" aria-expanded="true">
                                    
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated"
                                    data-bs-popper="static">
                                    @isset($app_currencies)
                                        @foreach ($app_currencies as $app_currency)
                                            <a data-value="{{ $app_currency->id }}" class="dropdown-item d-flex"
                                                onclick="selectDefaultCurrency(this)" href="javascript:void(0);">
                                                <img src="{{ asset($app_currency->flag) }}" alt="img"
                                                    class="me-2 country mt-1">
                                                <span class="fs-13 text-wrap">
                                                    {{ $app_currency->code }} ({{ $app_currency->symbol }})
                                                </span>
                                            </a>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                            <div class="dropdown d-lg-none d-flex responsive-search">
                                <a href="javascript:void(0);" class="nav-link icon" data-bs-toggle="dropdown"> <svg
                                        xmlns="http://www.w3.org/2000/svg" class="header-icon search-icon"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <button class="btn btn-primary-color" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="header-icon search-icon p-1 mt-1" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown profile-dropdown d-flex">
                                <a href="javascript:void(0);" class="nav-link pe-0 leading-none"
                                    data-bs-toggle="dropdown"> <span class="header-avatar1"> <img
                                            src="{{ asset(Auth::user()->profile_pics->url ?? 'assets/dashboard/images/photos/22.jpg') }}"
                                            alt="img" class="avatar avatar-md brround"> </span> </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
                                    <div class="text-center mb-2 mt-2">
                                        <div class="text-center user pb-0 font-weight-bold">
                                            {{ Auth::user()->name }}
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                    @if (Auth::user()->role == 'user')
                                        <a class="dropdown-item d-flex" href="{{ route('user.settings') }}"> <svg
                                                class="header-icon me-2" xmlns="http://www.w3.org/2000/svg"
                                                height="24" viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z">
                                                </path>
                                            </svg>
                                            <div class="fs-13">Profile</div>
                                        </a>
                                    @endif
                                    @if (Auth::user()->role == 'vendor')
                                        <a class="dropdown-item d-flex" href="{{ route('vendor.settings') }}">
                                            <svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg"
                                                height="24" viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z">
                                                </path>
                                            </svg>
                                            <div class="fs-13">Profile</div>
                                        </a>
                                    @endif
                                    @if (Auth::user()->role == 'admin')
                                        <a class="dropdown-item d-flex" href="{{ route('admin.settings') }}">
                                            <svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg"
                                                height="24" viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z">
                                                </path>
                                            </svg>
                                            <div class="fs-13">Profile</div>
                                        </a>
                                    @endif
                                    @if (Auth::user()->role == 'sub_admin')
                                        <a class="dropdown-item d-flex" href="{{ route('admin.sub_admin_profile') }}">
                                            <svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg"
                                                height="24" viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z">
                                                </path>
                                            </svg>
                                            <div class="fs-13">Profile</div>
                                        </a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
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

