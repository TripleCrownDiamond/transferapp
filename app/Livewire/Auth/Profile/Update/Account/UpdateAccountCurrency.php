<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use App\Models\Currency;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountCurrency extends Component
{
    public $currencies;
    public $profileScore;
    public $user;
    public $accounts;
    public $account;
    public $actual_currency;
    public $currency;
    public $currency_id;

    public function mount()
    {
        $this->currencies = Currency::all();
        $this->user = auth()->user();
        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts->first();
        $this->currency_id = $this->account->currency_id;
        if ($this->currency_id === null) {
            $this->actual_currency = null;
        } else {
            $this->actual_currency = Currency::find($this->currency_id);
        }
    }

    public function updateCurrency()
    {
        $validate_currency = $this->validate([
            'currency' => 'required'
        ], [
            'currency.required' => __('profile-messages.update_account.currency_required')
        ]);

        if ($validate_currency) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($account->currency_id === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->account->currency_id = $this->currency;
            $this->currency_id = $this->account->currency_id;
            $account = $this->account->save();

            if ($account) {

                $this->reset([
                    'currency_id',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_account.currency_updated'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_currency = Currency::find($this->account->currency_id);

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
        return view('livewire.auth.profile.update.account.update-account-currency');
    }
}
