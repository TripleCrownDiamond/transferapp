<?php

namespace App\Livewire\Auth\Components;

use Livewire\Component;

class Status extends Component
{
    public $is_active;
    public $showSuccessAlert = true;
    public $superAdmin;

    protected $listeners = ['is_activeChanged' => 'refreshComponent'];

    public function mount()
    {
        $this->is_active = $this->checkUserStatus();
        $this->superAdmin = $this->checkSuperAdmin();
    }

    public function checkUserStatus()
    {
        $user = auth()->user();

        if ($user && !$this->superAdmin) {
            return $user->is_active == 1;
        }

        return false;
    }

    public function hideMessage()
    {
        $this->showSuccessAlert = false;
    }

    public function checkSuperAdmin()
    {
        $user = auth()->user();

        return $user && $user->role === 'super-admin';
    }

    public function refreshComponent()
    {
        $this->is_active = $this->checkUserStatus();
    }
    public function render()
    {
        return view('livewire.auth.components.status');
    }
}
