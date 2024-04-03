<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateProfession'>
        <h6>{{ __('profile-messages.update_user.profession_updating') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="profession">{{ __('profile-messages.update_user.profession_label') }}</label>
                @if ($actual_profession === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: {{ $actual_profession }}</small></span>
                @endif
                <input name="profession" id="profession" class="form-control" wire:model='profession' type="text"
                    placeholder="@if ($actual_profession === null) {{ __('profile-messages.update_user.undefined_field') }} @else {{ $actual_profession }} @endif">
                @error('profession')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateProfession'
                        wire:loading.attr="disabled" wire:model='profession'>
                        <span wire:loading
                            wire:model='profession'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='profession'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </form>
</div>
