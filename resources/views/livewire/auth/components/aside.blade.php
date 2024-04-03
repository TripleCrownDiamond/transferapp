<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <img src={{ asset('theme/assets/img/logo-ct-dark.png') }} class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold h4">{{ env('APP_NAME') }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        @if (auth()->user()->role === 'user')
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.dashboard_menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                        href="{{ route('profile') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.profile_menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->segment(1) === 'loans' ? 'active' : '' }}"
                        href="{{ route('loans') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.loan_menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->segment(1) === 'finances' ? 'active' : '' }}"
                        href="{{ route('finances') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-money-bill-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.finances_menu') }}</span>
                    </a>
                </li>
            </ul>
        @elseif(auth()->user()->role === 'super-admin')
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.dashboard_menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                        href="{{ route('profile') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.profile_menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->segment(1) === 'clients' ? 'active' : '' }}"
                        href="{{ route('clients') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.clients_menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->segment(1) === 'loans' ? 'active' : '' }}"
                        href="{{ route('loans') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.loan_menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link {{ request()->segment(1) === 'finances' ? 'active' : '' }}"
                        href="{{ route('finances') }}">
                        <div
                            class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-money-bill-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ __('dashboard-messages.aside.finances_menu') }}</span>
                    </a>
                </li>
            </ul>
        @else
        @endif
    </div>
    <div class="sidenav-footer mx-3 ">
        <a class="btn bg-gradient-danger mt-3 w-100" href="javascript:;" data-bs-toggle="modal"
            data-bs-target="#confirm-logout-modal"><i class="fa fa-sign-out" aria-hidden="true"></i>
            {{ __('login-register-messages.Login.logout') }}</a>

    </div>
</aside>
