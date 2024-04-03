<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updatePassword'>
        <h6>{{ __('profile-messages.update_user.password_updating') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="current_password">{{ __('profile-messages.update_user.current_password_label') }}</label>
                <input name="current_password" id="current_password" class="form-control" wire:model='current_password'
                    type="password" placeholder="{{ __('profile-messages.update_user.current_password_placeholder') }}">
                @error('current_password')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="new_password">{{ __('profile-messages.update_user.new_password_label') }}</label>
                <input name="new_password" id="new_password" class="form-control" wire:model='new_password'
                    type="password" placeholder="{{ __('profile-messages.update_user.new_password_placeholder') }}">
                @error('new_password')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="confirm_password">{{ __('profile-messages.update_user.confirm_password_label') }}</label>
                <input name="confirm_password" id="confirm_password" class="form-control" wire:model='confirm_password'
                    type="password" placeholder="{{ __('profile-messages.update_user.confirm_password_placeholder') }}">
                <a href="javascript:;" style="font-size: 10px;" class="toggle-password"
                    onclick="togglePassword('new_password', 'confirm_password')">
                    {{ __('login-register-messages.ShowHidePasswordMessages.show_password') }}
                </a><br>
                @error('confirm_password')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
            </div>
        </div>
        <div class="col-4 mt-2">
            <button class="btn btn-dark" type="submit" wire:click.prevent='updatePassword' wire:loading.attr="disabled"
                wire:model='new_password'>
                <span wire:loading
                    wire:model='new_password'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                <span wire:loading.remove
                    wire:model='new_password'>{{ __('profile-messages.update_form_buttons.update') }}</span>
            </button>
        </div>
        <hr>
    </form>
</div>
