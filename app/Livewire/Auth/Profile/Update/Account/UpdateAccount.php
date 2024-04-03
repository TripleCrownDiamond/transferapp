<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use App\Models\Country;
use Livewire\Component;

class UpdateAccount extends Component
{

    public $user;
    public $accounts;
    public $account;
    public $iban;
    public $showAccountUpdateForm = true;


    public function mount()
    {
        $this->user = auth()->user();
        $this->accounts = $this->user->accounts;
        $this->account = $this->accounts->first();
        $this->iban = $this->account->iban;
        if ($this->iban !== null) {
            $this->showAccountUpdateForm = false;
        }
    }

    public function render()
    {

        return view('livewire.auth.profile.update.account.update-account');
    }
}
