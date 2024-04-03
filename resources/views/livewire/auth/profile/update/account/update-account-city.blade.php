<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateCity'>
        <h6>{{ __('profile-messages.update_account.city_update_form_title') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="city">{{ __('profile-messages.update_account.city_label') }}</label>
                @if ($actual_city === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: {{ $actual_city }}</small></span>
                @endif
                <input type="text" name="city" id="city" class="form-control" wire:model='city'
                    placeholder="@if ($actual_city === null) {{ __('profile-messages.update_user.undefined_field') }}  @else {{ $actual_city }} @endif">
                @error('city')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateCity'
                        wire:loading.attr="disabled" wire:model='city'>
                        <span wire:loading
                            wire:model='city'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='city'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </form>
</div>
