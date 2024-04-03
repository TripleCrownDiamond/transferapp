<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountAddressLine1 extends Component
{
    public $user;
    public $accounts;
    public $account;
    public $address_line1;
    public $actual_address_line1;
    public $profileScore;

    public function mount()
    {
        $this->user = Auth::user();
        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts->first();
        $this->actual_address_line1 = $this->account->adress_line1;
    }

    public function updateAddressLine1()
    {
        $validate_address = $this->validate(
            [
                'address_line1' => 'required',
            ],
            [
                'address_line1.required' => __('profile-messages.update_account.address_line1_required'),

            ]
        );

        if ($validate_address) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($account->adress_line1 === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->account->adress_line1 = $this->address_line1;
            $account = $this->account->save();

            if ($account) {
                $this->reset([
                    'address_line1',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_account.address_line1_updated'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_address_line1 = $this->account->adress_line1;

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
        return view('livewire.auth.profile.update.account.update-account-address-line1');
    }
}
