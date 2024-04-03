<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateAddressLine1'>
        <h6>{{ __('profile-messages.update_account.update_address_line1_form_title') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="address_line1">{{ __('profile-messages.update_account.address_line1_label') }}</label>
                @if ($actual_address_line1 === null)
                    <span><small> : {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: {{ $actual_address_line1 }}</small></span>
                @endif
                <input type="text" name="address_line1" id="address_line1" class="form-control"
                    wire:model='address_line1'
                    placeholder="@if ($actual_address_line1 === null) {{ __('profile-messages.update_user.undefined_field') }} @else {{ $actual_address_line1 }} @endif">
                @error('address_line1')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateAddressLine1'
                        wire:loading.attr="disabled" wire:model='address_line1'>
                        <span wire:loading
                            wire:model='address_line1'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='address_line1'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <hr>
    </form>
</div>
