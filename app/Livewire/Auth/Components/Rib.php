<?php

namespace App\Livewire\Auth\Components;

use App\Models\AppConfiguration;
use Livewire\Component;

class Rib extends Component
{
    public $name;
    public $code1;
    public $code2;
    public $bicswift;
    public $account_number;
    public $iban;
    public $cleRib;
    public $show_rib = true;
    public function mount()
    {
        $this->hydrate();
    }
    public function hydrate()
    {
        $this->name = auth()->user()->name;
        $account = auth()->user()->accounts()->first();
        $appConfig = AppConfiguration::first();

        if ($account) {
            $this->code1 = $appConfig->code_banque;
            $this->code2 = $appConfig->code_guichet;
            $this->bicswift = $appConfig->bicswift;
            $this->account_number = $account->account_number;
            $this->iban = $account->iban;
            $this->cleRib = $account->cle_rib;
        }
    }
    public function hideRib()
    {
        $this->show_rib = false;
    }
    public function render()
    {
        return view('livewire.auth.components.rib');
    }
}
