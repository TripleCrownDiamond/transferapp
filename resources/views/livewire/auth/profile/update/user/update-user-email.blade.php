<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updatEemail'>
        <h6>Mise à jour de l'email</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="email">E-mail</label>
                <span><small>: {{ $actual_email }}</small></span>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="email"
                    placeholder="{{ $actual_email }}" wire:model='email'>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateEmail'
                        wire:loading.attr="disabled" wire:model='email'>
                        <span wire:loading
                            wire:model='email'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='email'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </form>
</div>
