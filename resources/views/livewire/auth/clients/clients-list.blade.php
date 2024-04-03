<div>
    <div wire:poll.2.5>
        <h3>{{ __('clients_page_messages.client_list.title') }}
        </h3>
        <hr>
        <br>
        @if ($this->show_details_view)
            <livewire:auth.clients.client-details :id : user />
        @else
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>{{ __('clients_page_messages.client_list.list_title') }}</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                @if (count($users) === 0)
                                    <div class='container m-2'>
                                        <p class="align-items-center">
                                            {{ __('clients_page_messages.client_list.no_client_yet') }}
                                        </p>
                                    </div>
                                @else
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">
                                                        {{ __('clients_page_messages.client_list.name') }}
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                                        {{ __('clients_page_messages.client_list.date') }}
                                                    </th>
                                                    <th class="text-secondary opacity-10">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr :key="time().$user['id']">

                                                        <td class="align-middle">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $user['name'] }}
                                                            </p>
                                                        </td>

                                                        <td class="align-middle">
                                                            <span class="text-secondary text-xs font-weight-bold">
                                                                {{ \Carbon\Carbon::parse($user['created_at'])->locale(app()->getLocale())->diffForHumans() }}
                                                            </span>

                                                        </td>

                                                        <td class="align-middle d-flex justify-content-flex mt-3">
                                                            <a href="#"
                                                                class="text-primary font-weight-bold text-xs"
                                                                wire:click="showDetails({{ $user['id'] }})">
                                                                {{ __('clients_page_messages.client_list.details') }}
                                                            </a>

                                                            <span class="mx-2"></span>
                                                            <!-- Ajoute un espace de 2 unités entre les deux boutons -->

                                                            <a href="#"
                                                                class="text-danger font-weight-bold text-xs"
                                                                wire:click="delete({{ $user['id'] }})">
                                                                {{ __('clients_page_messages.client_list.delete') }}
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        {{ $users->links('layouts.pagination') }}
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
