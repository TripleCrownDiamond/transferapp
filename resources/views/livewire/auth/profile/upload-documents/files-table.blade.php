<div wire:poll.2s>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>{{ __('upload-documents.files_table.title') }}</h6>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    @if (empty($filesArray))
                        <div class='container m-2'>
                            <p class="align-items-center">{{ __('upload-documents.files_table.empty_message') }}</p>
                        </div>
                    @else
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                            N°
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">
                                            {{ __('upload-documents.files_table.document_type') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                            {{ __('upload-documents.files_table.link') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                            {{ __('upload-documents.files_table.uploaded') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                                            {{ __('upload-documents.files_table.status') }}
                                        </th>
                                        <th class="text-secondary opacity-10">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($filesArray as $file)
                                        <tr :key="time().$file['id']">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>{{ $file['id'] }} </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ __('upload-documents.file_types.' . $file['document_type']) }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="storage/uploads/verifications-files/{{ $file['file_link'] }}"
                                                    target="_blank">{{ __('upload-documents.files_table.link') }}</a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ \Carbon\Carbon::parse($file['created_at'])->locale(app()->getLocale())->isoFormat('LL') }}
                                                </span>

                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-{{ $file['status'] == 'accepted' ? 'success' : ($file['status'] == 'rejected' ? 'danger' : 'secondary') }}">
                                                    {{ __('upload-documents.files_table.' . $file['status']) }}
                                                </span>

                                            </td>
                                            <td class="align-middle">
                                                @if ($file['status'] == 'rejected')
                                                    <!-- Link to trigger the delete modal -->
                                                    <a href="#" class="text-danger font-weight-bold text-xs"
                                                        wire:click="deleteFile({{ $file['database_id'] }})">
                                                        {{ __('upload-documents.upload_files.delete_link') }}
                                                    </a>
                                                @else
                                                    <!-- Link for other statuses (e.g., 'accepted', 'pending') -->
                                                    <a href="#" class="text-secondary font-weight-bold text-xs"
                                                        disabled>
                                                        {{ __('upload-documents.upload_files.delete_link') }}

                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
