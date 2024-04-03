<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountCountry extends Component
{

    public $countries;
    public $profileScore;
    public $user;
    public $accounts;
    public $account;
    public $actual_country;
    public $country;
    public $country_id;

    public function mount()
    {
        $this->countries = Country::all();
        $this->user = auth()->user();
        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts->first();
        $this->country_id = $this->account->country_id;
        if ($this->country_id === null) {
            $this->actual_country = null;
        } else {
            $this->actual_country = Country::find($this->country_id);
        }
    }

    public function updateCountry()
    {
        $validate_country = $this->validate([
            'country' => 'required'
        ], [
            'country.required' => __('profile-messages.update_account.country_required')
        ]);

        if ($validate_country) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($account->country_id === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->account->country_id = $this->country;
            $this->country_id = $this->account->country_id;
            $account = $this->account->save();

            if ($account) {

                $this->reset([
                    'country',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_account.country_updated'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_country = Country::find($this->country_id);

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
        return view('livewire.auth.profile.update.account.update-account-country');
    }
}
