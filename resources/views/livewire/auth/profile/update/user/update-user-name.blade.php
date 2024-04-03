<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateName'>
        <h6>{{ __('profile-messages.update_user.name_updating') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="name">{{ __('profile-messages.update_user.name_label') }}</label>
                <span><small>: {{ $actual_name }}</small></span>
                <input type="text" class="form-control" name="name" id="" aria-describedby="name"
                    placeholder="{{ $actual_name }}" wire:model='name'>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateName'
                        wire:loading.attr="disabled" wire:model='name'>
                        <span wire:loading
                            wire:model='name'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='name'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </form>
</div>
