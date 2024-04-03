<div>
    <h4>{{ __('profile-messages.profile_header.general_menu') }}</h4>
    <hr>
    <div class="row">
        <livewire:auth.profile.update.user.update-user-name />
        <livewire:auth.profile.update.user.update-user-email />
        @if (auth()->user()->role === 'user')
            <livewire:auth.profile.update.user.update-user-sex />
            <livewire:auth.profile.update.user.update-user-birth-date />
            <livewire:auth.profile.update.user.update-user-profession />
            <livewire:auth.profile.update.user.update-user-monthly-revenue />
            <livewire:auth.profile.update.user.update-user-marital-status />
        @endif
        <livewire:auth.profile.update.user.update-user-password />
    </div>
</div>
