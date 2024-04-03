<div>
    <h3>{{ __('upload-documents.upload_files.upload_files_title') }}</h3>
    <form class="mb-4" method="post" wire:submit.prevent="uploadFiles1">
        <div class="mb-3">
            <label for="file_type_id" class="form-label">{{ __('upload-documents.file_types.title') }}</label>
            <select class="form-control" id="file_type_id" name="file_type_id" wire:model="file_type_id"
                wire:change="updateShowFile2">
                <option value="}">{{ __('profile-messages.update_user.select_label') }} </option>
                @foreach ($file_types as $file_type)
                    <option value="{{ $file_type->id }}">
                        {{ __('upload-documents.file_types.' . $file_type->name) }}
                    </option>
                @endforeach
            </select>
            @error('file_type_id')
                <small class="text-danger">{{ $message }}</small>
                <br>
            @enderror
        </div>
        @if ($showFile2)
            <div class="mb-3">
                <h5>{{ __('upload-documents.id_documents_accepted.title') }}</h5>
                <ul>
                    @for ($i = 1; $i < 4; $i++)
                        <li>{{ __('upload-documents.id_documents_accepted.document' . $i) }}</li>
                    @endfor
                </ul>
            </div>
        @elseif($showResidenceProof)
            <div class="mb-3">
                <h5>{{ __('upload-documents.residence_documents_accepted.title') }}</h5>
                <ul>
                    @for ($i = 1; $i < 6; $i++)
                        <li>{{ __('upload-documents.residence_documents_accepted.document' . $i) }}</li>
                    @endfor
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="formFile" class="form-label">{{ __('upload-documents.upload_files.file1_label') }}</label>
            <input class="form-control" wire:model="file1" type="file" id="file1">
            @error('file1')
                <small class="text-danger">{{ $message }}</small>
                <br>
            @enderror
        </div>
        @if ($showFile2)
            <div class="mb-3">
                <label for="formFile" class="form-label">{{ __('upload-documents.upload_files.file2_label') }}</label>
                <input class="form-control" wire:model="file2" type="file" id="file2">
                @error('file2')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
            </div>
        @else
        @endif
        <div class="col-4 mt-2">
            <button class="btn btn-dark" type="submit" wire:click.prevent="uploadFiles1" wire:loading.attr="disabled"
                wire:target="uploadFiles1">
                <span wire:loading.delay
                    wire:target="uploadFiles1">{{ __('upload-documents.upload_files.uploading') }}</span>
                <span wire:loading.delay.remove
                    wire:target="uploadFiles1">{{ __('upload-documents.upload_files.upload') }}</span>
            </button>
        </div>
    </form>
</div>
