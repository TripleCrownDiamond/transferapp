<div>
    <div wire:poll.2.5>
        <h3>{{ auth()->user()->role === 'user' ? __('loans-messages.loans-list.your_loans_requests') : __('loans-messages.loans-list.loans_requests') }}
        </h3>
        <hr>
        <br>
        @if ($this->show_details_view)
            <livewire:auth.loans.loan-details :id : datas />
        @else
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>{{ __('loans-messages.loans-list.history') }}</h6>
                                <span class='flex flex-end float-end'>
                                    <button
                                        class="btn btn-sm btn-primary @if ($status === '') active @endif"
                                        wire:click="filterStatus('')">{{ __('loans-messages.loans-list.all') }}</button>
                                    <button
                                        class="btn btn-sm btn-success @if ($status === 'approved') active @endif"
                                        wire:click="filterStatus('approved')">{{ __('loans-messages.loans-list.approved') }}</button>
                                    <button class="btn btn-sm btn-danger @if ($status === 'rejected') active @endif"
                                        wire:click="filterStatus('rejected')">{{ __('loans-messages.loans-list.rejected') }}</button>
                                    <button
                                        class="btn btn-sm btn-secondary @if ($status === 'pending') active @endif"
                                        wire:click="filterStatus('pending')">{{ __('loans-messages.loans-list.pending') }}</button>
                                </span>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                @if (count($loan_datas) === 0)
                                    <div class='container m-2'>
                                        <p class="align-items-center">
                                            {{ __('loans-messages.loans-list.no_loan_yet') }}
                                        </p>
                                    </div>
                                @else
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    @if (auth()->user()->role === 'super-admin')
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">
                                                            {{ __('loans-messages.loans-list.name') }}
                                                        </th>
                                                    @endif
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">
                                                        {{ __('loans-messages.loans-list.amount') }}
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                                        {{ __('loans-messages.loans-list.duration') }}
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                                        {{ __('loans-messages.loans-list.date') }}
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                                        {{ __('loans-messages.loans-list.status') }}
                                                    </th>
                                                    <th class="text-secondary opacity-10">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($loan_datas as $loan_data)
                                                    <tr :key="time().$loan_data['id']">
                                                        @if (auth()->user()->role === 'super-admin')
                                                            <td class="">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $this->getUser($loan_data['account_id'])->name }}
                                                                </p>
                                                            </td>
                                                        @endif

                                                        <td class="align-middle text-center">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $loan_data['amount'] . ' ' . (auth()->user()->role === 'user' ? $currency : $this->getCurrency($loan_data['account_id'])) }}
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $loan_data['repayment_duration'] . ' ' . __('loans-messages.loans-list.month') }}
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">
                                                                {{ \Carbon\Carbon::parse($loan_data['created_at'])->locale(app()->getLocale())->diffForHumans() }}
                                                            </span>

                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span
                                                                class="badge badge-sm bg-gradient-{{ $loan_data['status'] == 'approved' ? 'success' : ($loan_data['status'] == 'rejected' ? 'danger' : 'secondary') }}">
                                                                {{ __('loans-messages.loans-list.' . $loan_data['status']) }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle d-flex justify-content-between mt-3">
                                                            <a href="#"
                                                                class="text-primary font-weight-bold text-xs"
                                                                wire:click="showDetails({{ $loan_data['id'] }})">
                                                                {{ __('loans-messages.loans-list.details') }}
                                                            </a>

                                                            @if (auth()->user()->role === 'super-admin' && $loan_data['status'] === 'pending')
                                                                <a href="javascript:;"
                                                                    class="text-success font-weight-bold text-xs ml-2"
                                                                    wire:click='accept({{ $loan_data['id'] }})'>
                                                                    {{ __('loans-messages.loans-list.accept') }}
                                                                </a>

                                                                <a href="#"
                                                                    class="text-danger font-weight-bold text-xs ml-2"
                                                                    wire:click="reject({{ $loan_data['id'] }})">
                                                                    {{ __('loans-messages.loans-list.reject') }}
                                                                </a>
                                                            @endif
                                                            @if (auth()->user()->role === 'super-admin')
                                                                <a href="#"
                                                                    class="text-danger font-weight-bold text-xs ml-2"
                                                                    wire:click="delete({{ $loan_data['id'] }})">
                                                                    {{ __('loans-messages.loans-list.delete') }}
                                                                </a>
                                                            @endif
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        {{ $loan_datas->links('layouts.pagination') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
