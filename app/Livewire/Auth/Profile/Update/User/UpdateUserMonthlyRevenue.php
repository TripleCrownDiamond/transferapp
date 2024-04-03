<?php

namespace App\Livewire\Auth\Profile\Update\User;

use App\Models\Currency;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserMonthlyRevenue extends Component
{

    public $user;
    public $accounts;
    public $account;
    public $monthly_revenue;
    public $actual_monthly_revenue;
    public $currency_id;
    public $currency;
    public $profileScore;

    public function mount()
    {
        $this->user = Auth::user();
        $this->actual_monthly_revenue = $this->user->monthly_revenue;

        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts[0];
        $this->currency_id = $this->account->currency_id;

        if ($this->currency_id === null) {
            $this->currency = null;
        } else {
            $this->currency = Currency::find($this->currency_id)->code;
        }

    }

    public function updateMonthlyRevenue()
    {
        $validatie_monthly_revenue = $this->validate([
            'monthly_revenue' => 'required|numeric'
        ], [
            'monthly_revenue.required' => __('profile-messages.error_success_message.field_required'),
            'monthly_revenue.numeric' => __('profile-messages.update_user.monthly_income_numeric')
        ]);

        if ($validatie_monthly_revenue) {
            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($authUser->monthly_revenue === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->user->monthly_revenue = $this->monthly_revenue;

            $user = $this->user->save();

            if ($user) {
                $this->reset([
                    'monthly_revenue',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_user.monthly_income_updated'),
                    position: 'center',
                    timer: 2500
                );

                $this->actual_monthly_revenue = $this->user->monthly_revenue;

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
        return view('livewire.auth.profile.update.user.update-user-monthly-revenue');
    }
}
