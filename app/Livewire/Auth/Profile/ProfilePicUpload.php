<?php

namespace App\Livewire;

use Livewire\Component;

class ProfilePicUpload extends Component
{
    public $profilePhoto; 
    
    protected $listeners = ['showProfilePicUpload'];

    public function showProfilePicUpload()
    {
        $this->emit('showProfilePicUploadModal');
    }

    public function render()
    {
        return view('livewire.profile-pic-upload');
    }
}
