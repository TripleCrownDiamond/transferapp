<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateCurrency'>
        <h6>{{ __('profile-messages.update_account.currency_update_form_title') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="currency">{{ __('profile-messages.update_account.currency_label') }}</label>
                @if ($actual_currency === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: {{ $actual_currency->name }}</small></span>
                @endif
                <select name="currency" id="currency" class="form-control" wire:model='currency'>
                    <option value="">{{ __('profile-messages.update_user.select_label') }}</option>
                    @foreach ($currencies as $currency)
                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                    @endforeach
                </select>
                @error('currency')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateCurrency'
                        wire:loading.attr="disabled" wire:model='currency'>
                        <span wire:loading
                            wire:model='currency'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='currency'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <hr>
    </form>
</div>
