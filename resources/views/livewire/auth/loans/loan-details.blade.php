<div wire:poll.2.5>
    <style>
        .text-hover-success:hover {
            color: green;
        }

        .text-hover-danger:hover {
            color: red;
        }
    </style>
    <div>
        <span class='float-end mr-4'>
            <a wire:navigate href="{{ route('loans') }}">Retour</a>
        </span>
    </div>
    <div class='row'>
        <div class='col-4'>
            <h4>
                {{ __('loans-messages.loans-list.details') }}
            </h4>
        </div>
        <div class='col-8'>
            <span>
                <h5>{{ __('loans-messages.details.credit_id') }}: {{ $datas['uniq_id'] }}</h5>
            </span>

            <span class='float-end'>
                <small>
                    <span><small>{{ __('loans-messages.details.status') }}: </small></span>
                    <span
                        class="badge badge-sm bg-gradient-{{ $datas['status'] == 'approved' ? 'success' : ($datas['status'] == 'rejected' ? 'danger' : 'secondary') }}">
                        {{ __('loans-messages.loans-list.' . $datas['status']) }}
                    </span>
                </small>
            </span>
        </div>
    </div>
    <br>
    <div class='container'>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('loans-messages.details.credit_infos') }}</h5>
                <div
                    class='table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl'>
                    <table
                        class="table table-bordered table-condensed table-striped table-hover table-sm table-light table-group-divider table">
                        <tbody>
                            <tr>
                                <td><small>{{ __('loans-messages.details.date') }}</small></td>
                                <td>
                                    <strong>
                                        <small>
                                            {{ \Carbon\Carbon::parse($datas['created_at'])->locale(app()->getLocale())->isoFormat('LLLL') }}
                                        </small>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.type') }}</small></td>
                                <td>
                                    <strong>
                                        <small>{{ __('loans-messages.loan_types.' . $this->getType($datas['credit_type_id'])->name) }}</small>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.reason') }}</small></td>
                                <td><strong><small>{{ $datas['credit_motif'] }}</small></strong></td>
                            </tr>
                            <tr class='text-hover-success'>
                                <td><small>{{ __('loans-messages.details.amount') }}</small></td>
                                <td class="bg-success text-light text-hover-success">
                                    <strong>
                                        <small
                                            class="text-hover-success">{{ $datas['amount'] . ' ' . $this->getCurrency($datas['account_id']) }}</small>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.loan_request.duration') }}</small></td>
                                <td><strong><small>{{ $datas['repayment_duration'] . ' ' . __('loans-messages.loans-list.month') }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.rate') }}</small></td>
                                <td><strong><small>{{ $datas['interest_rate'] }} %</small></strong></td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.grace_period') }}</small></td>
                                <td><strong><small>{{ $datas['grace_period'] . ' ' . __('loans-messages.loans-list.month') }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.mensual_rate') }}</small></td>
                                <td><strong><small>{{ $interest_rate_monthly }} %</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.monthly_interest') }}</small></td>
                                <td><strong><small>{{ $monthly_interest . ' ' . $this->getCurrency($datas['account_id']) }}
                                        </small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.total_interest') }}</small></td>
                                <td><strong><small>{{ $total_interest . ' ' . $this->getCurrency($datas['account_id']) }}
                                        </small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.monthly_payment') }}</small></td>
                                <td><strong><small>{{ $monthly_payment . ' ' . $this->getCurrency($datas['account_id']) }}
                                        </small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.total_payment') }}</small></td>
                                <td class='text-light bg-danger text-hover-danger'>
                                    <strong>
                                        <small
                                            class='text-hover-danger'>{{ $total_payment . ' ' . $this->getCurrency($datas['account_id']) }}
                                        </small>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.status') }}</small></td>
                                <td>
                                    <strong>
                                        <small>
                                            <span
                                                class="badge badge-sm bg-gradient-{{ $datas['status'] == 'approved' ? 'success' : ($datas['status'] == 'rejected' ? 'danger' : 'secondary') }}">
                                                {{ __('loans-messages.loans-list.' . $datas['status']) }}
                                            </span>
                                        </small>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ __('loans-messages.details.general_infos') }}</h5>
                <div
                    class='table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl'>
                    <table
                        class="table table-bordered table-condensed table-striped table-hover table-sm table-light table-group-divider table">
                        <tbody>
                            <tr>
                                <td><small>{{ __('loans-messages.details.name') }}</small></td>
                                <td><strong><small>{{ $this->getUser($datas['account_id'])->name }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.sex') }}</small></td>
                                <td>
                                    <strong><small>{{ __('profile-messages.update_user.sex_' . $this->getUser($datas['account_id'])->sex) }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.birthdate') }}</small></td>
                                <td>
                                    <strong>
                                        <small>
                                            {{ \Carbon\Carbon::parse($this->getUser($datas['account_id'])->birth_date)->locale(app()->getLocale())->isoFormat('LL') }}
                                        </small>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.profession') }}</small></td>
                                <td><strong><small>{{ $this->getUser($datas['account_id'])->profession }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.matrimonial') }}</small></td>
                                <td>
                                    <strong><small>{{ __('profile-messages.update_user.' . $this->getUser($datas['account_id'])->marital_status) }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.monthly_income') }}</small></td>
                                <td>
                                    <strong><small>{{ $this->getUser($datas['account_id'])->monthly_revenue . ' ' . $this->getCurrency($datas['account_id']) }}</small></strong>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ __('loans-messages.details.contact_infos') }}</h5>
                <div
                    class='table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl'>
                    <table
                        class="table table table-bordered table-condensed table-striped table-hover table-sm table-light table-group-divider table">
                        <tbody>
                            <tr>
                                <td><small>{{ __('loans-messages.details.country') }}</small></td>
                                <td><strong><small>{{ $this->getCountry($datas['account_id'])->name }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.city') }}</small></td>
                                <td><strong><small>{{ $this->getAccount($datas['account_id'])->city }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.address') }}</small></td>
                                <td><strong><small>{{ $this->getAccount($datas['account_id'])->adress_line1 }}</small></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.email') }}</small></td>
                                <td>
                                    <strong>
                                        <small>
                                            <a href="mailto:{{ $this->getUser($datas['account_id'])->email }}">
                                                {{ $this->getUser($datas['account_id'])->email }}
                                            </a>
                                        </small>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><small>{{ __('loans-messages.details.tel') }}</small></td>
                                <td>
                                    <strong>
                                        <small>
                                            {{ $this->getCountry($datas['account_id'])->phone_code . ' ' . $this->getAccount($datas['account_id'])->phone_number }}
                                        </small>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <hr>

    </div>
</div>
