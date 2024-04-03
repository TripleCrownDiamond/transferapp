<div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>{{ __('login-register-messages.Login.title') }}</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="login">
                        @csrf
                        <div class="mb-3">
                            <input placeholder="{{ __('login-register-messages.Login.email_placeholder') }}"
                                type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                wire:model.defer="email">
                            @error('email')
                                <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input placeholder="{{ __('login-register-messages.Login.password_placeholder') }}"
                                type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" wire:model.defer="password">
                            <a href="javascript:;" style="font-size: 10px;" class="toggle-password"
                                onclick="togglePassword('password','')">
                                {{ __('login-register-messages.ShowHidePasswordMessages.show_password') }}
                            </a><br>
                            @error('password')
                                <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2"
                                wire:loading.attr="disabled">
                                <span wire:target='login' wire:loading>
                                    {{ __('login-register-messages.LoginRegister.loading') }}
                                </span>
                                <span wire:target='login' wire:loading.remove>
                                    {{ __('login-register-messages.Login.login_button') }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
