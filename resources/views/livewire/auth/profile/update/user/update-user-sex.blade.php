<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updatSex'>
        <h6>{{ __('profile-messages.update_user.sex_updating') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="sex">{{ __('profile-messages.update_user.sex_label') }}</label>
                @if ($actual_sex === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: @if ($actual_sex === 'male')
                                {{ __('profile-messages.update_user.sex_male') }}
                            @elseif ($actual_sex === 'female')
                                {{ __('profile-messages.update_user.sex_female') }}
                            @else
                                {{ __('profile-messages.update_user.sex_others') }}
                            @endif
                        </small></span>
                @endif
                <select name="sex" id="sex" class="form-control" wire:model='sex'>
                    <option value="">{{ __('profile-messages.update_user.select_label') }}</option>
                    <option value="male">{{ __('profile-messages.update_user.sex_male') }}</option>
                    <option value="female">{{ __('profile-messages.update_user.sex_female') }}</option>
                    <option value="other">{{ __('profile-messages.update_user.sex_others') }}</option>
                </select>
                @error('sex')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateSex'
                        wire:loading.attr="disabled" wire:model='sex'>
                        <span wire:loading
                            wire:model='sex'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='sex'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </form>
</div>
