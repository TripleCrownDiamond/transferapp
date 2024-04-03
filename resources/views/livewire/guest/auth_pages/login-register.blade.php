<div>
    <!-- Navbar -->
    @include('components.guest.auth_pages_components.login-register-navbar')

    <main>
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('theme/assets/img/curved-images/curved14.jpg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">{{ env('APP_NAME') }}</h1>
                        <p class="text-lead text-white">
                            @if ($showLogin)
                                {{ __('login-register-messages.Login.indication') }}
                            @else
                                {{ __('login-register-messages.Register.indication') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if ($showLogin)
            <livewire:guest.auth_pages.login />
            <div class="container text-center">
                <p class="text-sm mt-3 mb-0">{{ __('login-register-messages.Login.not_yet_registered') }}
                    <a href="" wire:click.prevent="showRegisterForm"
                        class="text-dark font-weight-bolder">{{ __('login-register-messages.Login.register_link') }}</a>
                </p>
            </div>
        @else
            <livewire:guest.auth_pages.register :id="$id" />
            <div class="container text-center">
                <p class="text-sm mt-3 mb-0">{{ __('login-register-messages.Register.already_registered') }}
                    <a href="" wire:click.prevent="showLoginForm"
                        class="text-dark font-weight-bolder">{{ __('login-register-messages.Register.login_link') }}</a>
                </p>
            </div>
        @endif
        @include('components.guest.auth_pages_components.login-register-footer') <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS &
            COPYRIGHT ------- -->
    </main>
</div>
