<?php

namespace App\Livewire\Guest\AuthPages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.guest.auth_pages.login');
    }

    public function login()
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => __('login-register-messages.Login.email_required'),
            'email.email' => __('login-register-messages.Login.email_email'),
            'password.required' => __('login-register-messages.Login.password_required'),

        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Mise à jour de la colonne 'last_login' dans la table des utilisateurs
            Auth::user()->update(['last_login' => now()]);

            // Affichage d'une alerte SweetAlert en cas de succès
            $this->dispatch(
                'alert',
                type: 'success',
                title: __('login-register-messages.SwalErrorSuccess.success'),
                text: __('login-register-messages.Login.success_message'),
                position: 'center',
                timer: 2500
            );

            // Clear the form
            $this->reset(['email', 'password']);

            // Add a delay before redirection
            //sleep(5);

            return redirect()->route('dashboard');

        } else {
            // Affichage d'une alerte SweetAlert en cas d'échec de connexion
            $this->dispatch(
                'alert',
                type: 'error',
                title: __('login-register-messages.SwalErrorSuccess.error'),
                text: __('login-register-messages.Login.invalid_credentials'),
                position: 'center',
                timer: 2500
            );
        }
    }

    public function logout()
    {
        Auth::logout();
        // Add a delay before redirection
        sleep(5);

        return redirect('/auth');
    }
}
