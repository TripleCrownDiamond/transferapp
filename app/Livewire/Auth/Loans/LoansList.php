<?php

namespace App\Livewire\Auth\Loans;

use App\Models\Account;
use App\Models\Country;
use App\Models\Credit;
use App\Models\Currency;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Layout('layouts.dashboard')]
#[Title('Loans List')]
class LoansList extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $status = ''; // Ajout de la variable pour suivre le statut actif
    public $show_details_view = false;
    public $id;
    public $datas;
    public $loanId;
    public $type;

    // Autres méthodes et logique de composant ici...

    public function accept($loanId)
    {
        if ($loanId) {
            $credit_to_update = Credit::find($loanId);
            $this->type = 'accept';
            $user = $this->getUser($credit_to_update->account_id);
            if ($credit_to_update) {
                // Mettre à jour le champ 'status' à 'approved'
                $credit_to_update->update(['status' => 'approved']);
                $this->sendNotification($this->type, $user, $credit_to_update);
                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('loans-messages.confirm_modal.loan_approved'),
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

    public function reject($loanId)
    {
        if ($loanId) {
            $credit_to_update = Credit::find($loanId);
            $this->type = 'reject';
            $user = $this->getUser($credit_to_update->account_id);
            if ($credit_to_update) {
                // Mettre à jour le champ 'status' à 'approved'
                $credit_to_update->update(['status' => 'rejected']);
                $this->sendNotification($this->type, $user, $credit_to_update);
                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('loans-messages.confirm_modal.loan_rejected'),
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

    public function sendNotification($type, $user, $credit_to_update)
    {
        if ($type === 'accept') {
            $user->sendAcceptLoanNotification($credit_to_update);
        } else {
            $user->sendRejectLoanNotification($credit_to_update);
        }
    }

    public function delete(
        $loanId
    ) {
        if ($loanId) {
            $credit_to_update = Credit::find($loanId);

            if ($credit_to_update) {
                // Mettre à jour le champ 'status' à 'approved'
                $credit_to_update->delete();

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('loans-messages.confirm_modal.loan_deleted'),
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

    public function showDetails($id)
    {
        $this->show_details_view = true;
        $this->id = $id;
        $this->datas = Credit::find($this->id);
    }

    public function hideDetails()
    {
        $this->show_details_view = false;
    }

    public function filterStatus($status)
    {
        $this->status = $status;

    }


    public function getUser($account_id)
    {
        $account = Account::find($account_id);
        $user = $account->user()->first();
        return $user;
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
        if (auth()->user()->role === 'user') {

            $account = auth()->user()->accounts()->first();
            if ($account) {
                $userLoansQuery = $account->credits()->orderByDesc('created_at');
                $currency = Currency::find($account->currency_id)->code;
            }
            // Filtrer les crédits en fonction du statut actif
            if ($this->status) {
                $userLoansQuery->where('status', $this->status);
            }

            $loan_datas = $userLoansQuery->paginate($this->perPage);


        } elseif (auth()->user()->role === 'super-admin') {
            $adminLoansQuery = Credit::query();

            // Filtrer les crédits en fonction du statut actif
            if ($this->status) {
                $adminLoansQuery->where('status', $this->status);
            }

            $adminLoansQuery->orderBy('created_at', 'desc');

            $loan_datas = $adminLoansQuery->paginate($this->perPage);
            $currency = null;

        } else {

        }

        return view('livewire.auth.loans.loans-list', [
            'loan_datas' => $loan_datas,
            'currency' => $currency,
        ]);
    }
}
