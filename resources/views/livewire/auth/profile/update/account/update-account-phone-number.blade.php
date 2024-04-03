<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updatePhoneNumber'>
        <h6>{{ __('profile-messages.update_account.update_phone_number_form_title') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="phone_number">{{ __('profile-messages.update_account.phone_number_label') }}
                    <span class='text-danger'>({{ __('profile-messages.update_account.no_phone_code') }})</span>
                </label>
                @if ($actual_phone_number === null)
                    <span><small> : {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: {{ $actual_phone_number }}</small></span>
                @endif
                <input type="text" name="phone_number" id="phone_number" class="form-control" wire:model='phone_number'
                    placeholder="@if ($actual_phone_number === null) {{ __('profile-messages.update_user.undefined_field') }} @else {{ $actual_phone_number }} @endif">
                @error('phone_number')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updatePhoneNumber'
                        wire:loading.attr="disabled" wire:model='phone_number'>
                        <span wire:loading
                            wire:model='phone_number'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='phone_number'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <hr>
    </form>
</div>
