<?php

namespace App\Livewire\Auth\Profile\Update\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserSex extends Component
{
    public $user;
    public $sex;
    public $actual_sex;
    public $profileScore;

    public function mount()
    {
        $this->user = Auth::user();
        $this->actual_sex = $this->user->sex;
    }

    public function updateSex()
    {
        $validate_sex = $this->validate([
            'sex' => 'required'
        ], [
            'sex.required' => __('profile-messages.update_user.sex_required')
        ]);

        if ($validate_sex) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($authUser->sex === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();

                }
            }

            $this->user->sex = $this->sex;
            $user = $this->user->save();

            if ($user) {

                $this->reset([
                    'sex',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_user.sex_updated_message'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_sex = $this->user->sex;
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
        return view('livewire.auth.profile.update.user.update-user-sex');
    }
}
