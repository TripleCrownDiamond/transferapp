<?php

namespace App\Livewire\Auth\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.dashboard')]
#[Title('Profile')]

class Profile extends Component
{

    public $profileCompletionPercentage;
    public $activeTab = 'general';
    public $showProfilPercentage = true;

    //protected $listeners = ['refreshProfileCompletion' => '$refresh'];

    public function mount()
    {
        $user = Auth::user();

        $accounts = $user->accounts;

        if ($accounts->isNotEmpty()) {
            $account = $accounts->first();
            $this->profileCompletionPercentage = $account->profile_completion_percentage ?? 0;
        }
    }


    public function showAccountTab()
    {
        $this->activeTab = 'account';
    }

    public function showDocumentTab()
    {
        $this->activeTab = 'wish';
    }

    public function showProfilePicUpload()
    {
        $this->activeTab = 'profile-pic-upload';
        $this->showProfilPercentage = false;
    }

    public function resetTab()
    {
        $this->activeTab = 'general';
    }
    public function render()
    {
        return view('livewire.auth.profile.profile')->with('profileCompletionPercentage', $this->profileCompletionPercentage);
    }

}
