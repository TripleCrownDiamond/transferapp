<div>
    @if (auth()->user()->role === 'user')
        <div wire:poll="refreshComponent">
            @if ($is_active && $showSuccessAlert && !$superAdmin)
                <div class="alert alert-success animate__animated animate__fadeIn" role="alert">
                    <strong>{{ __('dashboard-messages.status.success') }}</strong>{{ __('dashboard-messages.status.active_account_message') }}
                </div>
                <a wire:click="hideMessage" class="float-end" style="margin-top: -15px; cursor: pointer">
                    <small class="text-danger">
                        <i class="fas fa-times me-2"></i>{{ __('dashboard-messages.rib.hide') }}
                    </small>
                </a>
            @elseif(!$is_active && !$superAdmin)
                <div class="alert alert-danger" role="alert">
                    <strong>{{ __('dashboard-messages.status.alert') }}</strong>{{ __('dashboard-messages.status.inactive_account_message') }}
                </div>
            @endif
        </div>
        <br>
    @endif
</div>
