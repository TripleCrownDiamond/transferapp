<div>
    <div>
        <form class="mb-4" action="" method="post" wire:submit.prevent='updateMaritalStatus'>
            <h6>{{ __('profile-messages.update_user.marital_status_title') }}</h6>
            <div class="form-group row">
                <div class="col-12">
                    <label for="marital_status">{{ __('profile-messages.update_user.marital_status_label') }}</label>
                    @if ($actual_marital_status === null)
                        <span><small>{{ __('profile-messages.update_user.undefined_field') }}</small></span>
                    @else
                        <span><small>:
                                @if ($actual_marital_status === 'married')
                                    {{ __('profile-messages.update_user.married') }}
                                @elseif ($actual_marital_status === 'single')
                                    {{ __('profile-messages.update_user.single') }}
                                @elseif ($actual_marital_status === 'divorced')
                                    {{ __('profile-messages.update_user.divorced') }}
                                @elseif ($actual_marital_status === 'widowed')
                                    {{ __('profile-messages.update_user.widowed') }}
                                @else
                                    {{ __('profile-messages.update_user.other') }}
                                @endif
                            </small></span>
                    @endif
                    <select name="marital_status" id="marital_status" class="form-control" wire:model='marital_status'>
                        <option value="">{{ __('profile-messages.update_user.select_label') }}</option>
                        <option value="married">{{ __('profile-messages.update_user.married') }}</option>
                        <option value="single">{{ __('profile-messages.update_user.single') }}</option>
                        <option value="divorced">{{ __('profile-messages.update_user.divorced') }}</option>
                        <option value="widowed">{{ __('profile-messages.update_user.widowed') }}</option>
                        <option value="other">{{ __('profile-messages.update_user.other') }}</option>
                    </select>
                    @error('marital_status')
                        <small class="text-danger">{{ $message }}</small>
                        <br>
                    @enderror
                    <div class="col-4 mt-2">
                        <button class="btn btn-dark" type="submit" wire:click.prevent='updateMaritalStatus'
                            wire:loading.attr="disabled" wire:model='marital_status'>
                            <span wire:loading
                                wire:model='marital_status'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                            <span wire:loading.remove
                                wire:model='marital_status'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                        </button>
                    </div>
                </div>
            </div>

            <hr>
        </form>
    </div>
</div>
