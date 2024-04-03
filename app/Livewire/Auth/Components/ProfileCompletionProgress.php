<?php

namespace App\Livewire\Auth\Components;

use App\Models\AppConfiguration;
use App\Models\Country;
use App\Models\UserConfiguration;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileCompletionProgress extends Component
{

    public $profileCompletionPercentage;
    public $progressBarClass;
    public $automatic_rib_value;
    public $iban;

    protected $listeners = ['profileUpdated' => 'updatingProgress'];

    public function mount()
    {
        $this->hydrate();
    }

    public function hydrate()
    {
        $user = Auth::user();
        $accounts = $user->accounts;

        if ($accounts->isNotEmpty()) {
            $account = $accounts->first();
            $this->profileCompletionPercentage = $account->profile_completion_percentage ?? 0;
            $this->iban = $account->iban;
        }

        $this->progressBarClass = $this->getProgressBarClassProperty();
        $this->automatic_rib_value = UserConfiguration::find(1)->automatic_rib;
    }

    public function getProgressBarClassProperty()
    {
        if ($this->profileCompletionPercentage >= 70) {
            return 'bg-success';
        } elseif ($this->profileCompletionPercentage >= 45) {
            return 'bg-warning';
        } else {
            return 'bg-danger';
        }
    }

    public function updatingProgress()
    {
        $this->hydrate();
    }
    public function activateRIB()
    {
        $accounts = auth()->user()->accounts();
        $account = $accounts->first();
        $this->country_id = $account->country_id;

        // Récupérer les codes de guichet et de banque depuis le modèle AppConfiguration
        $appConfig = AppConfiguration::first();
        $codeGuichet = $appConfig->code_guichet;
        $codeBanque = $appConfig->code_banque;

        $country = Country::find($this->country_id);

        // Générer un numéro de compte national hypothétique
        $nationalAccountNumber = $this->generateNationalAccountNumber($country);

        // Générer un IBAN en incluant les codes de guichet et de banque
        $iban = $this->generateIban($country, $nationalAccountNumber, $codeGuichet, $codeBanque);

        // Générer la clé RIB
        $cleRib = $this->generateCleRib($codeBanque, $codeGuichet, $nationalAccountNumber);

        if ($iban && $nationalAccountNumber && $cleRib && ($account->account_number === null || $account->iban === null)) {
            $account->update([
                'account_number' => $nationalAccountNumber,
                'iban' => $iban,
                'cle_rib' => $cleRib,
            ]);

            $this->dispatch(
                'alert',
                type: 'success',
                title: __('login-register-messages.SwalErrorSuccess.success'),
                text: __('dashboard-messages.profile_complete_progress.show_rib_success'),
                position: 'center',
                timer: 2500
            );
            $this->hydrate();
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

    protected function generateCleRib($codeBanque, $codeGuichet, $nationalAccountNumber)
    {
        // Exemple simplifié de génération de la clé RIB
        $ribConcatenation = $codeBanque . $codeGuichet . $nationalAccountNumber;
        $ribNumber = intval($ribConcatenation);
        $cleRib = 97 - ($ribNumber % 97);

        return sprintf('%02d', $cleRib);
    }

    protected function generateNationalAccountNumber($country)
    {
        // Générer un numéro de compte national hypothétique en fonction des spécifications du pays
        $length = $country->id_national_length;
        $type = $country->id_national_type;

        if ($type === 'numeric') {
            // Générer un numéro de compte national composé de chiffres
            $nationalAccountNumber = rand(pow(10, $length - 1), pow(10, $length) - 1);
        } else {
            // Générer un numéro de compte national composé de caractères alphanumériques
            $nationalAccountNumber = strtoupper(substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz0123456789', $length)), 0, $length));
        }

        return $nationalAccountNumber;
    }

    protected function generateIban($country, $nationalAccountNumber, $codeGuichet, $codeBanque)
    {
        // Générer un IBAN en incluant les codes de guichet et de banque
        $iban = $country->iso_code . sprintf('%02d', $country->iban_check_digits) . $codeBanque . $codeGuichet . $nationalAccountNumber;

        return $iban;
    }
    public function render()
    {
        return view('livewire.auth.components.profile-completion-progress', [
            'profileCompletionPercentage' => $this->profileCompletionPercentage,
            'progressBarClass' => $this->progressBarClass,
        ]);
    }
}
