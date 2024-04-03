<div class="row" wire:poll.2.5>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        @if (auth()->user()->role === 'user')
            @if ($iban != null)
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                        {{ __('dashboard-messages.stats.balance') }}</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        @if ($currency && $balance)
                                            <small style='font-size: 12px'>{{ $currency }}</small>
                                            {{ ' ' . $balance }}
                                        @else
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
        @elseif(auth()->user()->role === 'super-admin')
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                    {{ __('dashboard-messages.stats.users') }}</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $usersCount }}
                                    <span class="text-success text-sm">
                                        <small>-24h:
                                            {{ $last_24_hours_users > 0 ? '+' : '' }}
                                            {{ $last_24_hours_users }}
                                        </small>

                                    </span>
                                    <br>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        @if (auth()->user()->role === 'user')
            @if ($iban != null)
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                        {{ __('dashboard-messages.stats.loan_requests') }}</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $user_pending_loans }}
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
        @elseif(auth()->user()->role === 'super-admin')
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                    {{ __('dashboard-messages.stats.loan_requests') }}</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $super_pending_admin_loans }}
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        @if (auth()->user()->role === 'user')
            @if ($iban != null)
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                        {{ __('dashboard-messages.stats.approved_loan_requests') }}</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $user_approved_loans }}
                                        <span class="text-danger text-sm font-weight-bolder"></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
        @elseif(auth()->user()->role === 'super-admin')
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                    {{ __('dashboard-messages.stats.approved_loan_requests') }}</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $approved_loans }}
                                    <span class="text-danger text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>
    <div class="col-xl-3 col-sm-6">
        @if (auth()->user()->role === 'user')
            @if ($iban != null)
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                        {{ __('dashboard-messages.stats.active_cards') }}</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $user_card }}
                                        <span class="text-danger text-sm font-weight-bolder"></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
        @elseif(auth()->user()->role === 'super-admin')
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                    {{ __('dashboard-messages.stats.active_cards') }}</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $cards }}
                                    <span class="text-danger text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>
</div>
