<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <div class="sidebar-brand-full">
            <h5>RezaPutra</h5>
        </div>
{{--        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">--}}
{{--            <use xlink:href="{{ asset('icons/brand.svg#full') }}"></use>--}}
{{--        </svg>--}}
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('icons/brand.svg#signet') }}"></use>
        </svg>
    </div>
    @include('layouts.navigation')
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <div class="container-fluid">
            <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <svg class="icon icon-lg">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-menu') }}"></use>
                </svg>
            </button>
            <a class="header-brand d-md-none" href="#">
                <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="{{ asset('icons/brand.svg#full') }}"></use>
                </svg>
            </a>
            <ul class="header-nav d-none d-md-flex">
                @if(Auth::guard('admin')->check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.login') }}">Dashboard</a></li>
                @elseif(Auth::guard('web')->check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Dashboard</a></li>
                @endif

            </ul>
            <ul class="header-nav ms-auto">

            </ul>
            <ul class="header-nav ms-3">
                <li class="nav-item dropdown">
                    <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        @if(Auth::guard('admin')->check())
                            {{Auth::guard()->user()->name}}
                        @elseif(Auth::guard('web')->check())
                            {{Auth::guard()->user()->name}}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        @if(Auth::guard('admin')->check())
{{--                            Logout {{Auth::guard()->user()->name}}--}}
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                <svg class="icon me-2">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                                </svg>
                                {{ __('My profile') }}
                            </a>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg class="icon me-2">
                                        <use xlink:href="{{ asset('icons/coreui.svg#cil-account-logout') }}"></use>
                                    </svg>

                                    {{ __('Logout') }}
                                </a>
                            </form>

                        @elseif(Auth::guard('web')->check())
{{--                            Logout {{Auth::guard()->user()->name}}--}}
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                <svg class="icon me-2">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                                </svg>
                                {{ __('My profile') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg class="icon me-2">
                                        <use xlink:href="{{ asset('icons/coreui.svg#cil-account-logout') }}"></use>
                                    </svg>

                                    {{ __('Logout') }}
                                </a>
                            </form>
                        @endif
{{--                        <a class="dropdown-item" href="{{ route('profile.show') }}">--}}
{{--                            <svg class="icon me-2">--}}
{{--                                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>--}}
{{--                            </svg>--}}
{{--                            {{ __('My profile') }}--}}
{{--                        </a>--}}
{{--                        <form method="POST" action="{{ route('logout') }}">--}}
{{--                            @csrf--}}
{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault(); this.closest('form').submit();">--}}
{{--                                <svg class="icon me-2">--}}
{{--                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-account-logout') }}"></use>--}}
{{--                                </svg>--}}

{{--                                {{ __('Logout') }}--}}
{{--                            </a>--}}
{{--                        </form>--}}
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            @yield('content')
        </div>
    </div>
    <footer class="footer">
        <div> &copy; 2021
            RezaPutraDGP.
        </div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://facebook.com/Azkal182">Azkal Arif</a></div>
    </footer>
</div>
<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-coreui-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new coreui.Tooltip(tooltipTriggerEl)
    })
</script>
</body>
</html>
