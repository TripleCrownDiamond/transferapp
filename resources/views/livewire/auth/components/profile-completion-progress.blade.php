<div>
    <div wire:poll.2s>
        @if (auth()->user()->role === 'super-admin' || auth()->user()->role === 'admin')
        @else
            @if ($profileCompletionPercentage < 100)
                <div class="mb-2">
                    <div>
                        <h4>{{ __('dashboard-messages.profile_complete_progress.title') }}</h4>
                        <p class="text-danger">
                            {{ __('dashboard-messages.profile_complete_progress.message') }}</p>
                        <hr>
                    </div>
                    <div class="progress-wrapper">
                        <div class="progress-info">
                            <div class="progress-percentage">
                                <span class="text-sm font-weight-bold">{{ $profileCompletionPercentage }}%</span>
                            </div>
                        </div>

                        <div class="progress-bar {{ $progressBarClass }}" role="progressbar"
                            aria-valuenow="{{ $profileCompletionPercentage }}" aria-valuemin="0" aria-valuemax="100"
                            style="width: {{ $profileCompletionPercentage }}%;"></div>
                    </div>
                </div>
            @else
                @if ($iban === null)
                    @if ($automatic_rib_value === 1)
                        <div>
                            <div class="d-grid gap-2">
                                <button wire:click='activateRIB' type="button" name="" id=""
                                    class="btn btn-dark">
                                    {{ __('dashboard-messages.profile_complete_progress.show_rib') }}
                                </button>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
        @endif
    </div>
</div>
