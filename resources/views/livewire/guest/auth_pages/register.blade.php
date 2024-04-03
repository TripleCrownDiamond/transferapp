<div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>{{ __('login-register-messages.Register.title') }}</h5>
                </div>
                <div class="card-body">

                    <form wire:submit="register">
                        @csrf

                        <div class="mb-3">
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror @if (!$errors->has('name') && $name) is-valid @endif"
                                placeholder="{{ __('login-register-messages.Register.name_placeholder') }}"
                                aria-label="Name" aria-describedby="email-addon" wire:model="name">
                            @error('name')
                                <small class="text-danger" style="font-size: 10px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror @if (!$errors->has('email') && $email) is-valid @endif"
                                placeholder="{{ __('login-register-messages.Register.email_placeholder') }}"
                                aria-label="Email" aria-describedby="email-addon" wire:model="email">
                            @error('email')
                                <small class="text-danger" style="font-size: 10px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror @if (!$errors->has('password') && $password) is-valid @endif"
                                placeholder="{{ __('login-register-messages.Register.password_placeholder') }}"
                                aria-label="Password" aria-describedby="password-addon" wire:model="password"
                                id="password">

                            @error('password')
                                <small class="text-danger" style="font-size: 10px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password"
                                class="form-control @error('confirmPassword') is-invalid @enderror @if (!$errors->has('confirmPassword') && $confirmPassword) is-valid @endif"
                                placeholder="{{ __('login-register-messages.Register.confirm_password_placeholder') }}"
                                aria-label="Password Confirmation" wire:model="confirmPassword" id="confirmPassword">
                            <a href="javascript:;" style="font-size: 10px;" class="toggle-password"
                                onclick="togglePassword('password','confirmPassword')">
                                {{ __('login-register-messages.ShowHidePasswordMessages.show_password') }}
                            </a><br>
                            @error('confirmPassword')
                                <small class="text-danger" style="font-size: 10px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-check form-check-info text-left">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                wire:model="agree">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ __('login-register-messages.Register.i_agree') }} <a href="javascript:;"
                                    class="text-dark font-weight-bolder">{{ __('login-register-messages.Register.terms_and_conditions') }}</a>
                            </label><br>
                            @error('agree')
                                <small class="text-danger" style="font-size: 10px;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2"
                                wire:loading.attr="disabled">
                                <span wire:loading>
                                    {{ __('login-register-messages.LoginRegister.loading') }}
                                </span>
                                <span wire:loading.remove>
                                    {{ __('login-register-messages.Register.register_button') }}
                                </span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
