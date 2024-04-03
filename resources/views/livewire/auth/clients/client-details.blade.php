<div wire:poll.2.5>
    <div>
        <span class='float-end mr-4'>
            <a wire:navigate href="{{ route('clients') }}">Retour</a>
        </span>
    </div>
    <h1> {{ __('clients_page_messages.client_detail.title') . $user->id }}</h1>
    <div class='row'>
        <div class='col-12'>
            <span class='float-end'>
                <small>
                    <span>
                        <small>{{ __('clients_page_messages.client_detail.status') }}: </small>
                    </span>
                    @if ($user['is_active'] == 1)
                        @php $int = 1; @endphp
                    @else
                        @php $int = 0; @endphp
                    @endif

                    <span
                        class="badge badge-sm bg-gradient-{{ $user['is_active'] == 1 ? 'success' : ($user['is_active'] == 0 ? 'danger' : 'secondary') }}">
                        {{ __('clients_page_messages.client_detail.' . $int) }}
                    </span>

                </small>
            </span>
            <br>
            <br>
            <div class='row'>
                <div class="col-12">
                    @if ($user['is_active'] == 0)
                        <a href='#' class='btn btn-link float-end'
                            wire:click="activateUser({{ $user['id'] }})">{{ __('clients_page_messages.client_detail.activate_user') }}
                        </a>
                    @else
                    @endif
                </div>
            </div>
            <div class='container mb-2'>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('clients_page_messages.client_detail.general_infos') }}</h5>
                        <div
                            class='table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl'>
                            <table
                                class="table table-bordered table-condensed table-striped table-hover table-sm table-light table-group-divider table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_list.date') }}</small>
                                        </td>
                                        <td>
                                            <strong>
                                                <small>
                                                    {{ \Carbon\Carbon::parse($user['created_at'])->locale(app()->getLocale())->isoFormat('LLLL') }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_list.name') }}</small>
                                        </td>
                                        <td>
                                            <strong>
                                                <small>
                                                    {{ $user['name'] }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.email') }}</small>
                                        </td>
                                        <td>
                                            <strong>
                                                <small>
                                                    <a href='mailto:{{ $user['email'] }}'>
                                                        {{ $user['email'] }}</a>
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.last_login') }}</small>
                                        </td>
                                        <td class='bg-dark text-white'>
                                            <strong>
                                                <small>
                                                    {{ $user['last_login'] }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.sex') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ __('clients_page_messages.client_detail.' . $user['sex']) }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.birthdate') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $user['birth_date'] }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.profession') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $user['profession'] }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.monthly_income') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $user['monthly_revenue'] . ' ' . $this->getCurrency($user['id']) }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.marital_status') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ __('profile-messages.update_user.' . $user['marital_status']) }}
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

            <div class='container mb-2'>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('clients_page_messages.client_detail.account_infos') }}</h5>
                        <div
                            class='table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl'>
                            <table
                                class="table table-bordered table-condensed table-striped table-hover table-sm table-light table-group-divider table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.country') }}</small>
                                        </td>
                                        <td>
                                            <strong>
                                                <small>
                                                    {{ $this->getCountry($user['id']) }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.city') }}</small>
                                        </td>
                                        <td>
                                            <strong>
                                                <small>
                                                    {{ $this->getAccount($user['id'])->city }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.address') }}</small>
                                        </td>
                                        <td>
                                            <strong>
                                                <small>
                                                    {{ $this->getAccount($user['id'])->adress_line1 }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.postcode') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $this->getAccount($user['id'])->post_code }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.account_no') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $this->getAccount($user['id'])->account_number }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.iban') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $this->getAccount($user['id'])->iban }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.balance') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $this->getAccount($user['id'])->balance . ' ' . $this->getCurrency($user['id']) }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.tel') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $this->getCountryCode($user['id']) . ' ' . $this->getAccount($user['id'])->phone_number }}
                                                </small>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>{{ __('clients_page_messages.client_detail.account_type') }}</small>
                                        </td>
                                        <td class=''>
                                            <strong>
                                                <small>
                                                    {{ $this->getAccountType($user['id']) }}
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
    </div>
</div>
