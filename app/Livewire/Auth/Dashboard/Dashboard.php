<?php

namespace App\Livewire\Auth\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Title;

#[Layout('layouts.dashboard')]
#[Title('Dashboard')]

class Dashboard extends Component
{
    public $profileCompletionPercentage;
    public $showLoanRequestForm = false;

    public function mount()
    {
        $user = Auth::user();

        $accounts = $user->accounts;

        if ($accounts->isNotEmpty()) {
            $account = $accounts->first();
            $this->profileCompletionPercentage = $account->profile_completion_percentage ?? 0;
        }
    }

    public function render()
    {
        return view('livewire.auth.dashboard.dashboard')
            ->with('profileCompletionPercentage', $this->profileCompletionPercentage);
    }
}