<?php

// LoginRegister.php

namespace App\Livewire\Guest\AuthPages;

use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest-auth')]

class LoginRegister extends Component
{
    public $showLogin = true;

    public $id;

    public function mount($id = null)
    {
        $this->id = $id;
    }

    public function render()
    {
        if (Route::currentRouteName() === 'register') {
            $this->showRegisterForm();
        }

        return view('livewire.guest.auth_pages.login-register');
    }

    public function showLoginForm()
    {
        $this->showLogin = true;
    }

    public function showRegisterForm()
    {
        $this->showLogin = false;
    }
    
}