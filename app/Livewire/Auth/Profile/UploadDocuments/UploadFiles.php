<?php

namespace App\Livewire\Auth\Profile\UploadDocuments;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UploadFiles extends Component
{
    public $showForm1 = false;
    public $showForm2 = false;
    public $refreshIntervalInSeconds = 2;
    public $showDeleteFile = false;

    public function mount()
    {
        $this->hydrate();
    }

    public function hydrate()
    {
        $authUser = Auth::user();
        $files = $authUser->kycs;

        if (count($files) == 0) {
            $this->showForm1 = true;
            $this->showForm2 = false;
        } elseif (count($files) < 3 && !$files->contains('status', 'rejected')) {
            // Vérifiez si le document_type_id 1 figure au moins une fois
            if ($files->where('document_type_id', 1)->count() == 0) {
                $this->showForm1 = true;
                $this->showForm2 = false;
            } elseif (!$files->contains('document_type_id', 2)) {
                $this->showForm1 = false;
                $this->showForm2 = true;
            } else {
                $this->showForm1 = false;
                $this->showForm2 = false;
            }
        } elseif (count($files) == 3 && !$files->contains('status', 'rejected')) {
            $this->showForm1 = false;
            $this->showForm2 = false;
        } else {
            $this->showForm1 = false;
            $this->showForm2 = false;
        }

        if ($files->contains('status', 'rejected')) {
            $this->showForm1 = false;
            $this->showForm2 = false;
            $this->showDeleteFile = true;
        } else {
            $this->showDeleteFile = false;
        }

    }

    public function render()
    {
        return view('livewire.auth.profile.upload-documents.upload-files');
    }

    public function updatedShowForm1()
    {
        $this->hydrate();
    }

    public function updatedShowForm2()
    {
        $this->hydrate();
    }

    public function updatedRefreshIntervalInSeconds($value)
    {
        $this->hydrate();
    }
}
