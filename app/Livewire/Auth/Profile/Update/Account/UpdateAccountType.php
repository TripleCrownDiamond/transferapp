<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use App\Models\BankAccountType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountType extends Component
{
    public $actual_account_type;
    public $account_types;
    public $account_type;
    public $user;
    public $accounts;
    public $account;
    public function mount()
    {
        $this->user = auth()->user();
        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts->first();
        $this->actual_account_type = $this->account->bank_account_type_id;
        $this->account_types = BankAccountType::all();
        $this->actual_account_type = $this->account_types->find($this->actual_account_type);

    }

    public function updateAccountType()
    {
        $validate_account_type = $this->validate([
            'account_type' => 'required'
        ], [
            'account_type.required' => __('profile-messages.update_account.account_type_required')
        ]);

        if ($validate_account_type) {
            if ($this->accounts->isNotEmpty()) {
                $this->account = $this->accounts->first();

                if ($this->account->bank_account_type_id === null) {
                    $this->profileScore = intval($this->account->profile_completion_percentage) + 5;
                    $this->account->profile_completion_percentage = $this->profileScore;
                    $this->account->save();
                }
            }

            $account_type_updated = $this->account_type;

            $this->account->bank_account_type_id = $this->account_type;
            $this->account = $this->account->save();

            if ($this->account) {

                $this->reset([
                    'account_type',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_account.account_type_updated'),
                    position: 'center',
                    timer: 2500
                );

            }


            // Update $actual_name
            $this->actual_account_type = BankAccountType::find($account_type_updated);

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
        return view('livewire.auth.profile.update.account.update-account-type');
    }
}
