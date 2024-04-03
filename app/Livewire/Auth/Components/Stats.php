<?php

namespace App\Livewire\Auth\Components;

use App\Models\Card;
use App\Models\Credit;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Stats extends Component
{
    public $account;
    public $usersCount;
    public $super_pending_admin_loans;
    public $last_24_hours_users;
    public $last_24_hours_admin_loans;
    public $user_pending_loans;
    public $user_approved_loans;
    public $approved_loans;
    public $user_card;
    public $cards;
    public $iban;
    public $transactions;
    public $balance;
    public $currency;
    public function mount()
    {
        $this->hydrate();
    }
    public function hydrate()
    {
        $account = auth()->user()->accounts()->first();
        if ($account) {
            $this->balance = $account->balance;
            $currency_id = $account->currency_id;
            if ($currency_id) {
                $this->currency = Currency::find($currency_id)->code;
            }
            $this->iban = $account->iban;
            $this->user_card = $account->cards()->where('status', 'active')->count();
            $this->user_pending_loans = $account->credits()->where('status', 'pending')->count();
            $this->user_approved_loans = $account->credits()->where('status', 'approved')->count();
        }
        $this->usersCount = User::where('role', 'user')->count();
        $this->last_24_hours_users = User::where('role', 'user')
            ->where('created_at', '>', Carbon::now()->subDay())
            ->count();
        $this->super_pending_admin_loans = Credit::where('status', 'pending')->count();
        $this->approved_loans = Credit::where('status', 'approved')->count();
        $this->cards = Card::where('status', 'active')->count();


    }
    public function render()
    {
        return view('livewire.auth.components.stats');
    }
}
