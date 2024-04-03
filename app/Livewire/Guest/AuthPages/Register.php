<?php

namespace App\Livewire\Guest\AuthPages;

use Livewire\Component;
use App\Models\User;
use App\Models\Account;
use App\Models\UserConfiguration;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    public $agree;
    public $id;
    public $created_by;

    public function mount($id)
    {
        $this->id = isset($id) ? strval($id) : null;
        $this->created_by = $this->id;
    }

    public function register()
    {
        $translations = [
            'name.required' => __('login-register-messages.Register.name_required'),
            'email.required' => __('login-register-messages.Register.email_required'),
            'email.email' => __('login-register-messages.Register.email_email'),
            'email.unique' => __('login-register-messages.Register.email_unique'),
            'email.max' => __('login-register-messages.Register.email_max'),
            'password.required' => __('login-register-messages.Register.password_required'),
            'password.min' => __('login-register-messages.Register.password_min'),
            'password.max' => __('login-register-messages.Register.password_max'),
            'confirmPassword.required' => __('login-register-messages.Register.confirmPassword_required'),
            'confirmPassword.same' => __('login-register-messages.Register.confirmPassword_same'),
            'agree.required' => __('login-register-messages.Register.agree_required')
        ];

        $validate_datas = $this->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:8|max:255',
                'confirmPassword' => 'required|same:password',
                'agree' => 'required',
            ],
            $translations
        );

        if ($validate_datas) {
            $userConfiguration = UserConfiguration::first();

            $userIsActive = $userConfiguration && $userConfiguration->user_active;
            $accountIsActive = $userConfiguration && $userConfiguration->account_active;

            $user = [
                'uniq_id' => uniqid(),
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'is_active' => $userIsActive ? 1 : 0,
                'created_by' => $this->created_by,
            ];


            $user = User::create($user);
            // Récupérer le premier utilisateur avec le rôle "super-admin"
            $superAdmin = User::where('role', 'super-admin')->first();

            if ($user) {
                // Réinitialiser le formulaire en cas de succès
                $this->reset([
                    'name',
                    'email',
                    'password',
                    'confirmPassword',
                    'agree',
                ]);

                // Créer un compte pour l'utilisateur
                $account = Account::create([
                    'user_id' => $user->id,
                    'is_active' => $accountIsActive ? 1 : 0,
                    // Autres attributs du compte que vous souhaitez définir
                ]);

                if ($account) {
                    // Compte créé avec succès

                    // Affichage d'une alerte SweetAlert en cas de succès
                    $this->dispatch(
                        'alert',
                        type: 'success',
                        title: __('login-register-messages.SwalErrorSuccess.success'),
                        text: __('login-register-messages.Register.success_message'),
                        position: 'center',
                        timer: 5000
                    );

                    $user->sendWelcomeNotification();
                    // Générer le lien de vérification d'email et envoyer l'email
                    $user->sendEmailVerificationNotification();
                    $superAdmin->sendNewUserNotification();

                } else {
                    // Erreur lors de la création du compte

                    // Affichage d'une alerte SweetAlert en cas d'erreur
                    $this->dispatch(
                        'alert',
                        type: 'error',
                        title: __('login-register-messages.SwalErrorSuccess.error'),
                        text: __('login-register-messages.Register.error_message'),
                        position: 'center',
                        timer: 5000
                    );
                }
            } else {
                // Erreur lors de la création de l'utilisateur

                // Affichage d'une alerte SweetAlert en cas d'erreur
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

    public function render()
    {
        return view('livewire.guest.auth_pages.register', [
            'id' => $this->id
        ]);
    }
}
