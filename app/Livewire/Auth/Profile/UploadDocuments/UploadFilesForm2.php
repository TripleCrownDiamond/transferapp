<?php

namespace App\Livewire\Auth\Profile\UploadDocuments;

use App\Models\DocumentCategory;
use App\Models\Kyc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFilesForm2 extends Component
{
    use WithFileUploads;

    public $file1;
    public $file2;
    public $fileName1;
    public $fileName2;
    public $timestamp;
    public $file_types;
    public $file_type_id;
    public $progress = 0;
    public $showFile2 = false;
    public $showResidenceProof = false;
    public $profilScore;
    public $kycs = [];

    public function mount()
    {
        $this->file_types = DocumentCategory::all();
    }
    public function updateShowFile2()
    {
        if ($this->file_type_id === '1') {
            $this->showFile2 = true;
            $this->showResidenceProof = false;
        } elseif ($this->file_type_id === '2') {
            $this->showFile2 = false;
            $this->showResidenceProof = true;
        } else {
            $this->showFile2 = false;
            $this->showResidenceProof = false;
        }


    }

    public function uploadFiles1()
    {
        $rules = [
            'file1' => 'required|file',
            'file_type_id' => 'required|exists:document_categories,id',
        ];

        $messages = [
            'file1.required' => __('upload-documents.upload_files.file1_required'),
            'file1.file' => __('upload-documents.upload_files.file1_file'),
            'file_type_id.required' => __('upload-documents.upload_files.file_type_id_required'),
            'file_type_id.exists' => __('upload-documents.upload_files.file_type_id_exists'),
        ];

        if ($this->file2) {
            $rules['file2'] = 'file';
            $messages['file2.file'] = __('upload-documents.upload_files.file2_file');
        }

        $validate_files = $this->validate($rules, $messages);

        if ($validate_files) {
            $user = auth()->user();
            $userUniqId = $user->uniq_id;
            $userId = $user->id;

            // Créer le sous-dossier "verifications-files" si nécessaire
            $directory = 'public/uploads/verifications-files';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }

            // Générer un nom de fichier unique basé sur l'ID de l'utilisateur, l'UUID et le timestamp
            $this->timestamp = time();
            $this->fileName1 = $userUniqId . '_file1_' . $this->timestamp . '.' . $this->file1->getClientOriginalExtension();

            // Enregistrer le fichier 1 dans le sous-dossier avec le nouveau nom de fichier
            $path1 = $this->file1->storeAs($directory, $this->fileName1);

            $this->kycs[] = [
                'fileName1' => [
                    'file_link' => $this->fileName1,
                    'document_type_id' => $this->file_type_id,
                    'user_id' => $userId,
                    'status' => 'pending',
                ]
            ];

            // Vérifier si le fichier 2 existe
            if ($this->file2) {
                // Générer un nom de fichier unique basé sur l'ID de l'utilisateur, l'UUID et le timestamp
                $this->fileName2 = $userUniqId . '_file2_' . $this->timestamp . '.' . $this->file2->getClientOriginalExtension();

                // Enregistrer le fichier 2 dans le sous-dossier avec le nouveau nom de fichier
                $path2 = $this->file2->storeAs($directory, $this->fileName2);

                $this->kycs[] = [
                    'fileName2' => [
                        'file_link' => $this->fileName2,
                        'verso_link' => 'verso_link',
                        'document_type_id' => $this->file_type_id,
                        'user_id' => $userId,
                        'status' => 'pending',
                    ]
                ];
            }

            $authUser = Auth::user();
            $accounts = $authUser->accounts;
            $files = $authUser->kycs;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($files->contains('document_type_id', 2)) {
                    return $files;
                } else {
                    $this->profileScore = intval($account->profile_completion_percentage) + 15;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            // Enregistrer les fichiers dans la table Kyc
            foreach ($this->kycs as $kyc) {
                foreach ($kyc as $file) {
                    Kyc::create($file);
                }
            }

            $this->reset(['file1', 'file2', 'file_type_id']);


            $this->dispatch(
                'alert',
                type: 'success',
                title: __('login-register-messages.SwalErrorSuccess.success'),
                text: __('upload-documents.upload_files.file_uploaded'),
                position: 'center',
                timer: 2500
            );
        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: __('login-register-messages.SwalErrorSuccess.oups'),
                text: __('login-register-messages.Register.something_went_wrong'),
                position: 'center',
                timer: 2500
            );
        }

    }
    public function render()
    {
        return view('livewire.auth.profile.upload-documents.upload-files-form2');
    }
}
