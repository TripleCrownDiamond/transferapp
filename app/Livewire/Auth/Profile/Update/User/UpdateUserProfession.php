<?php

namespace App\Livewire\Auth\Profile\Update\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserProfession extends Component
{
    public $user;
    public $profession;
    public $actual_profession;
    public $profileScore;

    public function mount()
    {
        $this->user = Auth::user();
        $this->actual_profession = $this->user->profession;
    }

    public function updateProfession()
    {
        $validate_profession = $this->validate(
            [
                'profession' => 'required'
            ],
            [
                'profession.required' => __('profile-messages.error_success_message.field_required')
            ]
        );

        if ($validate_profession) {
            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($authUser->profession === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->user->profession = $this->profession;

            $user = $this->user->save();

            if ($user) {
                $this->reset([
                    'profession',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_user.profession_updated_message'),
                    position: 'center',
                    timer: 2500
                );

                $this->actual_profession = $this->user->profession;
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
    }

    public function render()
    {
        return view('livewire.auth.profile.update.user.update-user-profession');
    }
}
