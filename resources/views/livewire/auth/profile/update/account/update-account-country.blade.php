<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateCountry'>
        <h6>{{ __('profile-messages.update_account.country_update_form_title') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="country">{{ __('profile-messages.update_account.country_label') }}</label>
                @if ($actual_country === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: {{ $actual_country->name }}</small></span>
                @endif
                <select name="country" id="country" class="form-control" wire:model='country'>
                    <option value="">{{ __('profile-messages.update_user.select_label') }}</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateCountry'
                        wire:loading.attr="disabled" wire:model='country'>
                        <span wire:loading
                            wire:model='country'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='country'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <hr>
    </form>
</div>
