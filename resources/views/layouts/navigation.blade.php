<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        @if(Auth::guard('admin')->check())
            <a class="nav-link" href="{{ route('admin.home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
                </svg>
                {{ __('Dashboard') }}
            </a>
        @elseif(Auth::guard('web')->check())
            <a class="nav-link" href="{{ route('home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
                </svg>
                {{ __('Dashboard') }}
            </a>
        @endif

    </li>




    @if(Auth::guard('admin')->check())
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.credit') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
                </svg>
                {{ __('Credits') }}
            </a>
        </li>
        <li class="nav-group {{ (request()->is('admin/user*')) ? 'show' : '' }}" {{ (request()->is('admin/user*')) ? 'aria-expanded="true"' : '' }}>
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                </svg>
                User Management</a>
            <ul class="nav-group-items" {{ (request()->is('admin/user*')) ? 'style="height: auto;"' : '' }} >
                <li class="nav-item"><a class="nav-link {{ (request()->routeIs('admin.user')) ? 'active' : '' }}"
                                        href="{{ route('admin.user') }}"><span class="nav-icon"></span> User</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->routeIs('admin.customer')) ? 'active' : '' }}"
                                        href="{{ route('admin.customer') }}"><span class="nav-icon"></span> Customer</a>
                </li>
            </ul>
        </li>
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{ route('admin.customer') }}">--}}
        {{--                <svg class="nav-icon">--}}
        {{--                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>--}}
        {{--                </svg>--}}
        {{--                {{ __('Users') }}--}}
        {{--            </a>--}}
        {{--        </li>--}}
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('about') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('About us') }}
        </a>
    </li>

    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            Two-level menu
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="#" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                    </svg>
                    Child menu
                </a>
            </li>
        </ul>
    </li>
</ul>
