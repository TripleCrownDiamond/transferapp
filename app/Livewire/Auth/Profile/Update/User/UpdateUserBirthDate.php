<?php

namespace App\Livewire\Auth\Profile\Update\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserBirthDate extends Component
{
    public $user;
    public $birth_date;
    public $actual_birth_date;
    public $profileScore;

    public function mount()
    {
        $this->user = Auth::user();
        $this->actual_birth_date = $this->user->birth_date;
    }

    public function updateBirthDate()
    {
        $validate_birth_date = $this->validate([
            'birth_date' => 'required'
        ], [
            'birth_date.required' => 'Veuillez remplir le champ date de naissance !'
        ]);

        if ($validate_birth_date) {
            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($authUser->birth_date === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->user->birth_date = $this->birth_date;
            $user = $this->user->save();

            if ($user) {

                $this->reset([
                    'birth_date',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: 'Succès',
                    text: 'Votre date de naissance a été mis à jour !',
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_birth_date = $this->user->birth_date;
        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: 'Oups',
                text: 'Une erreur est survenue !',
                position: 'center',
                timer: 2500
            );
        }
    }

    public function render()
    {
        return view('livewire.auth.profile.update.user.update-user-birth-date');
    }
}
