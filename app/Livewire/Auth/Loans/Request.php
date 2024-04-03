<?php

namespace App\Livewire\Auth\Loans;

use App\Models\Credit;
use App\Models\CreditConfiguration;
use App\Models\CreditType;
use App\Models\Currency;
use App\Models\User;
use App\Notifications\CreditRequestNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Validation\Rule;

#[Layout('layouts.dashboard')]
#[Title('Loan Request')]
class Request extends Component
{
    public $progress;
    public $loans;
    public $interest_rate;
    public $grace_period;
    public $currency;
    public $amount;
    public $type;
    public $duration;
    public $reason;

    public function mount()
    {
        $this->hydrateData();
    }

    public function hydrate()
    {
        $this->hydrateData();
    }

    private function hydrateData()
    {
        $user = Auth::user();
        $accounts = $user->accounts;

        if ($accounts->isNotEmpty()) {
            $account = $accounts->first();
            $this->progress = $account->profile_completion_percentage ?? 0;
            $this->currency = Currency::find($account->currency_id)->code;
            $this->loans = $account->credits()->count();
        }
    }

    public function render()
    {
        $credit_types = CreditType::all();

        return view('livewire.auth.loans.request', [
            'credit_types' => $credit_types,
        ]);
    }

    public function navigateToLoans()
    {
        return $this->redirect('/loans', navigate: true);
    }

    public function submit()
    {
        $validate_credit = $this->validate([
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'exists:credit_types,id'],
            'duration' => ['required', 'numeric', 'min:1'],
            'reason' => ['required', 'string'],
        ], [
            'amount.required' => __('loans-messages.loan_request.errors.amount_required'),
            'amount.numeric' => __('loans-messages.loan_request.errors.amount_numeric'),
            'type.required' => __('loans-messages.loan_request.errors.type_required'),
            'type.exists' => __('loans-messages.loan_request.errors.type_exists'),

            'duration.required' => __('loans-messages.loan_request.errors.duration_required'),
            'duration.numeric' => __('loans-messages.loan_request.errors.duration_numeric'),
            'duration.min' => __('loans-messages.loan_request.errors.duration_min'),

            'reason.required' => __('loans-messages.loan_request.errors.reason_required'),
            'reason.string' => __('loans-messages.loan_request.errors.reason_string'),
        ]);


        // Créez votre modèle Credit avec les données soumises
        // (Remplacez Credit::create par la logique que vous devez exécuter)

        if ($validate_credit) {
            $this->interest_rate = CreditConfiguration::first()->interest_rate;
            $this->grace_period = CreditConfiguration::first()->grace_period;
            $maxUniqId = Credit::max('uniq_id');
            $uniqId = $maxUniqId !== null ? max(1000, $maxUniqId + 1) : 1000;
            $credit_created = Credit::create([
                'uniq_id' => $uniqId,
                'credit_type_id' => $this->type,
                'amount' => $this->amount,
                'repayment_duration' => $this->duration,
                'interest_rate' => $this->interest_rate,
                'grace_period' => $this->grace_period,
                'account_id' => Auth::user()->accounts->first()->id,
                'status' => 'pending',
                'credit_motif' => $this->reason,
            ]);

            if ($credit_created) {
                $superAdmin = User::where('role', 'super-admin')->first();
                $client = auth()->user();

                // Réinitialise les valeurs du formulaire après une soumission réussie
                Auth::user()->sendCreditRequestNotification($credit_created, $this->currency);
                $superAdmin->sendSuperAdminCreditRequestNotification($credit_created, $this->currency, $client);
                $this->amount = null;
                $this->type = null;
                $this->duration = null;
                $this->reason = null;
                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('loans-messages.loan_request.success'),
                    position: 'center',
                    timer: 2500
                );
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
}
