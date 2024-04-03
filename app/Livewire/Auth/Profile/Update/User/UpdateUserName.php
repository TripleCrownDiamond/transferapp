<?php

namespace App\Livewire\Auth\Profile\Update\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserName extends Component
{
    public $user;
    public $name;
    public $actual_name;

    public function mount()
    {
        $this->user = Auth::user();
        $this->actual_name = $this->user->name;
    }


    public function updateName()
    {

        $valivate_name = $this->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => __('profile-messages.error_success_message.field_required')
            ]
        );

        if ($valivate_name && $this->name !== $this->actual_name) {
            $this->user->name = $this->name;
            $user = $this->user->save();

            if ($user) {
                $this->reset([
                    'name',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_user.name_updated_message'),
                    position: 'center',
                    timer: 5000
                );
            }

            // Update $actual_name
            $this->actual_name = $this->user->name;

        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: __('login-register-messages.SwalErrorSuccess.error'),
                text: __('profile-messages.update_user.same_name_error_message'),
                position: 'center',
                timer: 5000
            );
        }
    }

    public function render()
    {
        return view('livewire.auth.profile.update.user.update-user-name');
    }
}
