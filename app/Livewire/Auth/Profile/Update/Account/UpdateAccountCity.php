<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountCity extends Component
{

    public $user;
    public $accounts;
    public $account;
    public $city;
    public $actual_city;
    public $profileScore;

    public function mount()
    {
        $this->user = auth()->user();
        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts->first();
        $this->actual_city = $this->account->city;

    }

    public function updateCity()
    {
        $validate_city = $this->validate([
            'city' => 'required'
        ], [
            'city.required' => __('profile-messages.update_account.city_required')
        ]);

        if ($validate_city) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($account->city === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->account->city = $this->city;
            $account = $this->account->save();

            if ($account) {
                $this->reset([
                    'city',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_account.city_updated'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_city = $this->account->city;

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
        return view('livewire.auth.profile.update.account.update-account-city');
    }
}
