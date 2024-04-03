<?php

namespace App\Livewire\Auth\Loans;

use App\Models\Account;
use App\Models\Country;
use App\Models\CreditType;
use Livewire\Component;

class LoanDetails extends Component
{
    public $id;
    public $datas;

    public function getUser($account_id)
    {
        $account = Account::find($account_id);
        $user = $account->user()->first();
        return $user;
    }


    public function getType($type_id)
    {
        $type = CreditType::find($type_id);
        return $type;
    }

    public function getAccount($account_id)
    {
        $account = Account::find($account_id);
        return $account;
    }

    public function getCountry($account_id)
    {
        $account = Account::find($account_id);
        $country = Country::find($account->country_id);
        return $country;
    }

    public function getCurrency($account_id)
    {
        $account = Account::find($account_id);
        $currency = $account->currency()->first();
        return $currency->code;
    }
    public function render()
    {
        $interest_rate_monthly = ($this->datas['interest_rate'] / 100) / $this->datas['repayment_duration'];
        $monthly_interest = $this->datas['amount'] * $interest_rate_monthly;

        $total_interest = $monthly_interest * $this->datas['repayment_duration'];
        $total_payment = $this->datas['amount'] + $total_interest;
        $monthly_payment = $total_payment / $this->datas['repayment_duration'];
        /*   $monthly_interest = ($this->datas['amount'] * $this->datas['interest_rate']) / 100;
          $total_interest = $monthly_interest * $this->datas['repayment_duration'];
          $total_payment = $this->datas['amount'] + $monthly_interest;

          // Calcul de monthly_payment en prenant en compte l'amortissement du capital
          $monthly_payment = $total_payment / $this->datas['repayment_duration'];

          // Calcul du taux d'intérêt mensuel en pourcentage du capital restant */


        return view('livewire.auth.loans.loan-details', [
            'monthly_interest' => $monthly_interest,
            'total_payment' => $total_payment,
            'monthly_payment' => $monthly_payment,
            'interest_rate_monthly' => $interest_rate_monthly,
            'total_interest' => $total_interest,
        ]);
    }


}
