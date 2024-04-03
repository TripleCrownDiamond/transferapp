<?php

namespace App\Livewire\Auth\Profile\Update\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateUserPassword extends Component
{
    public $user;
    public $current_password;
    public $new_password;
    public $confirm_password;
    public $password;

    public function updatePassword()
    {
        $validate_datas = $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => __('profile-messages.update_user.current_password_required'),
            'new_password.required' => __('profile-messages.update_user.new_password_required'),
            'new_password.min' => __('profile-messages.update_user.new_password_min'),
            'new_password.different' => __('profile-messages.update_user.new_password_different'),
            'confirm_password.required' => __('profile-messages.update_user.confirm_password_required'),
            'confirm_password.same' => __('profile-messages.update_user.confirm_password_same'),
        ]);
        $this->password = $this->current_password;

        if (!Hash::check($this->password, auth()->user()->password)) {
            $this->dispatch(
                'alert',
                type: 'error',
                title: __('login-register-messages.SwalErrorSuccess.error'),
                text: __('profile-messages.update_user.current_password_error'),
                position: 'center',
                timer: 2500
            );
            return;
        }

        if ($validate_datas) {
            // Mettre à jour le mot de passe de l'utilisateur
            $user = auth()->user();
            $user->password = Hash::make($this->new_password);
            $user = $user->save();
            if ($user) {
                $this->reset([
                    'current_password',
                    'new_password',
                    'confirm_password'
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_user.password_updated_message'),
                    position: 'center',
                    timer: 5000
                );
            }
        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: __('login-register-messages.SwalErrorSuccess.oups'),
                text: __('login-register-messages.Register.something_went_wrong'),
                position: 'center',
                timer: 5000
            );
        }

    }
    public function render()
    {
        return view('livewire.auth.profile.update.user.update-user-password');
    }
}
