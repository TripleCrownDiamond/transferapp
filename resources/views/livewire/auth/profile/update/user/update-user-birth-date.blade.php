<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateBirthDate'>
        <h6>Mise à jour de la date de naissance</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="birth_date">Date de naissance</label>
                @if ($actual_birth_date === null)
                    <span><small>: Date De Naissance Non Défini</small></span>
                @else
                    <span><small>: {{ $actual_birth_date }}</small></span>
                @endif
                <input name="birth_date" id="birth_date" class="form-control" wire:model='birth_date' type="date"
                    name="" id="">
                @error('birth_date')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateBirthDate'
                        wire:loading.attr="disabled" wire:model='birth_date'>
                        <span wire:loading
                            wire:model='birth_date'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='birth_date'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <hr>
    </form>
</div>
