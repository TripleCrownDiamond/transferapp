<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateAccountType'>
        <h6>{{ __('profile-messages.update_account.account_type_update_form_title') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="account_type">{{ __('profile-messages.update_account.account_type_label') }}</label>
                @if ($actual_account_type === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>:
                            {{ __('profile-messages.account_types.' . $actual_account_type->name) }}</small></span>
                @endif
                <select name="account_type" id="account_type" class="form-control" wire:model='account_type'>
                    <option value="">{{ __('profile-messages.update_user.select_label') }}</option>
                    @foreach ($account_types as $account_type)
                        <option value="{{ $account_type->id }}">
                            {{ __('profile-messages.account_types.' . $account_type->name) }}</option>
                    @endforeach
                </select>
                @error('account_type')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateAccountType'
                        wire:loading.attr="disabled" wire:model='account_type'>
                        <span wire:loading
                            wire:model='account_type'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='account_type'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <hr>
    </form>
</div>
