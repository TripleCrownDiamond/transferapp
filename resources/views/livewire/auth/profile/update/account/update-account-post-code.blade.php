<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updatePostCode'>
        <h6>{{ __('profile-messages.update_account.post_code_update_form_title') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="post_code">{{ __('profile-messages.update_account.post_code_label') }}</label>
                @if ($actual_post_code === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                @else
                    <span><small>: {{ $actual_post_code }}</small></span>
                @endif
                <input type="text" name="post_code" id="post_code" class="form-control" wire:model='post_code'
                    placeholder="@if ($actual_post_code === null) {{ __('profile-messages.update_user.undefined_field') }}  @else {{ $actual_post_code }} @endif">
                @error('post_code')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updatePostCode'
                        wire:loading.attr="disabled" wire:model='post_code'>
                        <span wire:loading
                            wire:model='post_code'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='post_code'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </form>
</div>
