<?php

namespace App\Livewire\Auth\Profile\Update\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserEmail extends Component
{

    public $user;
    public $email;
    public $actual_email;
    public $email_verified_at;

    public function mount()
    {
        $this->user = Auth::user();
        $this->actual_email = $this->user->email;
    }

    public function updateEmail()
    {

        $validate_email = $this->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ], [
            'email.required' => __('profile-messages.error_success_message.field_required'),
            'email.email' => __('profile-messages.update_user.invalid_email_error'),
            'email.unique' => __('profile-messages.update_user.email_unique_error'),
        ]);

        if ($validate_email && $this->email !== $this->actual_email) {

            $this->user->email = $this->email;
            $this->user->email_verified_at = null;
            $user = $this->user->save();

            if ($user) {

                $this->reset([
                    'email',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_user.email_updated_message'),
                    position: 'center',
                    timer: 2500
                );
            }
            // Update $actual_name

            $this->actual_email = $this->user->email;
            $this->email_verified_at = $this->user->email_verified_at;
            $this->user->sendEmailVerificationNotification();

        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: __('login-register-messages.SwalErrorSuccess.error'),
                text: 'Le nouvel email doit être différent de l\'ancien !',
                position: 'center',
                timer: 2500
            );
        }
    }

    public function render()
    {
        return view('livewire.auth.profile.update.user.update-user-email');
    }
}
