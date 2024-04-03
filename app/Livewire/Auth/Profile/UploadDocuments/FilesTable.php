<?php

namespace App\Livewire\Auth\Profile\UploadDocuments;

use App\Events\KycAddedEvent;
use App\Models\DocumentCategory;
use App\Models\Kyc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class FilesTable extends Component
{
    use WithPagination;

    public $files;
    public $user;
    public $filesArray = [];

    protected $listeners = [
        'kycAdded' => 'refreshFiles',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->hydrate(); // Call the hydrate method during mount
    }

    public function hydrate()
    {
        $this->refreshFiles();
    }

    public function deleteFile($fileId)
    {
        $fileToDelete = Kyc::find($fileId);

        if ($fileToDelete) {
            Storage::delete('public/uploads/verifications-files/' . $fileToDelete->file_link);
            $fileToDelete->delete();
            $this->refreshFiles();
            $this->dispatchSuccessAlert(__('upload-documents.upload_files.confirm_delete_file_deleted'));
        } else {
            $this->dispatchErrorAlert();
        }
    }

    public function refreshFiles()
    {
        $this->files = $this->user->kycs;
        $this->refreshFilesArray();
    }

    protected function refreshFilesArray()
    {
        $this->filesArray = [];

        foreach ($this->files as $index => $file) {
            $this->filesArray[] = [
                'id' => $index + 1,
                'database_id' => $file->id,
                'file_link' => $file->file_link,
                'verso_link' => $file->verso_link,
                'document_type' => DocumentCategory::find(intval($file->document_type_id))->name,
                'status' => $file->status,
                'created_at' => $file->created_at,
            ];
        }
    }

    protected function dispatchSuccessAlert($message)
    {
        $this->dispatch('alert', [
            'type' => 'success',
            'title' => __('login-register-messages.SwalErrorSuccess.success'),
            'text' => $message,
            'position' => 'top-end',
            'timer' => 3000,
        ]);
    }

    protected function dispatchErrorAlert()
    {
        $this->dispatch('alert', [
            'type' => 'error',
            'title' => __('login-register-messages.SwalErrorSuccess.oups'),
            'text' => __('login-register-messages.Register.something_went_wrong'),
            'position' => 'top-end',
            'timer' => 3000,
        ]);
    }

    public function render()
    {
        return view('livewire.auth.profile.upload-documents.files-table');
    }
}
