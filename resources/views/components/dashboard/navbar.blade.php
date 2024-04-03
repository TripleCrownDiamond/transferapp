<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                        href="javascript:;">{{ env('APP_NAME') }}</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    aria-current="page">
                    {{ __('dashboard-messages.aside.' . request()->segment(1) . '_menu') }}
                </li>
            </ol>
            @if (auth()->user()->role === 'user')
                <h6 class="font-weight-bolder mb-0">{{ __('dashboard-messages.nav_bar.client_account') }}</h6>
            @endif
            @if (auth()->user()->role === 'admin')
                <h6 class="font-weight-bolder mb-0">{{ __('dashboard-messages.nav_bar.admin_account') }}</h6>
            @endif
            @if (auth()->user()->role === 'super-admin')
                <h6 class="font-weight-bolder mb-0">{{ __('dashboard-messages.nav_bar.super_admin') }}</h6>
            @endif

        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">

            <ul class="navbar-nav justify-content-end">
                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                    <!-- Cacher sur mobile -->
                    <li class="nav-item d-none d-md-flex" style="margin-right: 12px">
                        <div class="col-md-5">
                            <div class="dropdown custom-dropdown">
                                <a href="#" data-toggle="dropdown"
                                    class="d-flex align-items-center dropdown-link text-left" aria-haspopup="true"
                                    aria-expanded="false" data-offset="0, 20">
                                    <div class="profile-pic mr-6">
                                        <img style="width: 35px; c " src="{{ asset('utilisateur.png') }}"
                                            alt="Image">
                                    </div>
                                </a>
                                <div style="" class="dropdown-menu dropdown-menu-left"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" wire:navigate href={{ route('profile') }}><span
                                            class="icon icon-user"></span>{{ __('dashboard-messages.aside.profile_menu') }}</a>
                                    <a class="dropdown-item" wire:navigate href="#"><span
                                            class="icon icon-cog"></span>{{ __('dashboard-messages.nav_bar.config_menu') }}</a>
                                    <a class="dropdown-item" wire:navigate href="#" data-bs-toggle="modal"
                                        data-bs-target="#confirm-logout-modal"><span
                                            class="icon icon-sign-out"></span>{{ __('login-register-messages.Login.logout') }}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <p class="mt-2">
                            @if (auth()->user()->role === 'admin')
                                MultiAdminMode
                            @else
                                SuperAdminMode
                            @endif
                        </p>
                    </li>
                @endif
                @if (auth()->user()->role === 'user')
                    <li class="nav-item d-none d-md-flex" style="margin-right: 12px">
                        <div class="col-md-5">
                            <div class="dropdown custom-dropdown">
                                <a href="#" data-toggle="dropdown"
                                    class="d-flex align-items-center dropdown-link text-left" aria-haspopup="true"
                                    aria-expanded="false" data-offset="0, 20">
                                    <div class="profile-pic mr-6">
                                        <img style="width: 35px" src="{{ asset('utilisateur.png') }}" alt="Image">
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" wire:navigate href={{ route('profile') }}><span
                                            class="icon icon-user"></span>{{ __('dashboard-messages.aside.profile_menu') }}</a>
                                    <a class="dropdown-item" wire:navigate href="#"><span
                                            class="icon icon-cog"></span>{{ __('dashboard-messages.nav_bar.config_menu') }}</a>
                                    <a class="dropdown-item" wire:navigate href="#" data-bs-toggle="modal"
                                        data-bs-target="#confirm-logout-modal"><span
                                            class="icon icon-sign-out"></span>{{ __('login-register-messages.Login.logout') }}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-dark btn-sm mb-0 me-3" href="{{ route('loans.request') }}"
                            wire:navigate>
                            <i class="fa fa-piggy-bank mr-10 text-dark"
                                style="font-size: 14px; margin-right: 7px"></i>{{ __('dashboard-messages.nav_bar.request_loan_button') }}</a>
                    </li>
                @endif
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
