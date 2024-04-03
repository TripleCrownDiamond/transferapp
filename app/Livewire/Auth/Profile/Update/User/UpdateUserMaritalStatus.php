<?php

namespace App\Livewire\Auth\Profile\Update\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserMaritalStatus extends Component
{
    public $user;
    public $marital_status;
    public $actual_marital_status;
    public $profileScore;

    public function mount()
    {
        $this->user = Auth::user();
        $this->actual_marital_status = $this->user->marital_status;
    }

    public function updateMaritalStatus()
    {
        $validated_marital_status = $this->validate([
            'marital_status' => 'required'
        ], [
            'marital_status.required' => __('profile-messages.update_user.marital_status_required')
        ]);

        if ($validated_marital_status) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($authUser->marital_status === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->user->marital_status = $this->marital_status;
            $user = $this->user->save();

            if ($user) {

                $this->reset([
                    'marital_status',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_user.marital_status_updated'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_marital_status
            $this->actual_marital_status = $this->user->marital_status;
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
        return view('livewire.auth.profile.update.user.update-user-marital-status');
    }
}