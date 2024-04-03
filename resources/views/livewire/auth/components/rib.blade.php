<div>
    @if (auth()->user()->role === 'user')
        <div wire:poll.2.5>
            @if ($iban !== null)
                @if ($show_rib)
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="card">
                                <div class="card-header pb-0 px-3">
                                    <h6 class="mb-0">{{ __('dashboard-messages.rib.title') }}</h6>
                                </div>
                                <div class="card-body pt-4 p-3">
                                    <ul class="list-group">
                                        <li
                                            class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <table>
                                                    <tr>
                                                        <td><strong>{{ __('dashboard-messages.rib.name') }}:</strong>
                                                        </td>
                                                        <td>{{ $name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ __('dashboard-messages.rib.bank_code') }}:</strong>
                                                        </td>
                                                        <td>{{ $code1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ __('dashboard-messages.rib.guichet_code') }}:</strong>
                                                        </td>
                                                        <td>{{ $code2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ __('dashboard-messages.rib.bicswift') }}:</strong>
                                                        </td>
                                                        <td>{{ $bicswift }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ __('dashboard-messages.rib.account_no') }}:</strong>
                                                        </td>
                                                        <td>{{ $account_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ __('dashboard-messages.rib.iban') }}:</strong>
                                                        </td>
                                                        <td>{{ $iban }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ __('dashboard-messages.rib.rib_key') }}:</strong>
                                                        </td>
                                                        <td>{{ $cleRib }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                    wire:click='hideRib'>
                                                    <i
                                                        class="fas fa-times me-2"></i>{{ __('dashboard-messages.rib.hide') }}
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    @elseif (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
    @else
    @endif
</div>
