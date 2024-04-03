<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountPhoneNumber extends Component
{
    public $user;
    public $accounts;
    public $account;
    public $phone_number;
    public $actual_phone_number;
    public $profileScore;

    public function mount()
    {
        $this->user = auth()->user();
        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts->first();
        $this->actual_phone_number = $this->account->phone_number;

    }

    public function updatePhoneNumber()
    {
        $validate_phone_number = $this->validate([
            'phone_number' => 'required'
        ], [
            'phone_number.required' => __('profile-messages.update_account.phone_number_required')
        ]);

        if ($validate_phone_number) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($account->phone_number === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->account->phone_number = str_replace(' ', '', $this->phone_number);
            $account = $this->account->save();

            if ($account) {
                $this->reset([
                    'phone_number',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_account.phone_number_updated'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_phone_number = $this->account->phone_number;

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
        return view('livewire.auth.profile.update.account.update-account-phone-number');
    }
}
