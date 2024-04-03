<div wire:poll.{{ $refreshIntervalInSeconds }}s>
    <h4>{{ __('upload-documents.upload_files.documents_verification_title') }}</h4>
    <hr>
    @if ($showDeleteFile)
        <h5>{{ __('upload-documents.upload_files.delete_rejected_files') }}</h5>
    @endif

    @if ($showForm1)
        <livewire:auth.profile.upload-documents.upload-files-form />
    @elseif($showForm2)
        <livewire:auth.profile.upload-documents.upload-files-form2 />
    @endif
    <livewire:auth.profile.upload-documents.files-table />
    <!-- Delete Modal -->

</div>
