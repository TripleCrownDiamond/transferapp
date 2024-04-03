<div>
    <h4>{{ __('profile-messages.update_account.title') }}</h4>
    <hr>
    <div class="row">
        @if ($showAccountUpdateForm)
            <livewire:auth.profile.update.account.update-account-form :countries />
        @else
            <livewire:auth.profile.update.account.account-setting-finished />
        @endif
    </div>
</div>
