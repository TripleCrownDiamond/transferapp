<?php

namespace App\Livewire\Auth\Clients;

use App\Models\BankAccountType;
use App\Models\Country;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.dashboard')]
#[Title('Client Details')]
class ClientDetails extends Component
{
    public $id;
    public $user;

    public function activateUser($idtoupdate)
    {
        $userToUpdate = User::find($idtoupdate);
        if ($userToUpdate) {
            $userToUpdate->update(['is_active' => 1]);
            $this->dispatchAlert('success', __('clients_page_messages.client_detail.user_activated'));
        } else {
            $this->dispatchAlert('error', __('login-register-messages.Register.something_went_wrong'));
        }
    }

    private function dispatchAlert($type, $text)
    {
        $this->dispatch(
            'alert',
            type: $type,
            title: __('login-register-messages.SwalErrorSuccess.' . ($type === 'success' ? 'success' : 'oups')),
            text: $text,
            position: 'center',
            timer: 2500
        );
        $this->render();
    }

    public function getCurrency($id)
    {
        $account = $this->getAccount($id);
        $currency = $account ? $account->currency()->first() : null;
        return $currency ? $currency->code : null;
    }


    public function getAccount($id)
    {
        return User::find($id)->accounts()->first();
    }

    public function getCountry($id)
    {
        $account = $this->getAccount($id);
        return optional(Country::find($account->country_id))->name;
    }
    public function getCountryCode($id)
    {
        $account = $this->getAccount($id);
        return optional(Country::find($account->country_id))->phone_code;
    }

    public function getAccountType($id)
    {
        $account = $this->getAccount($id);
        return optional(BankAccountType::find($account->bank_account_type_id))->name;
    }

    public function render()
    {
        return view('livewire.auth.clients.client-details', [
            'user' => $this->user
        ]);
    }
}
