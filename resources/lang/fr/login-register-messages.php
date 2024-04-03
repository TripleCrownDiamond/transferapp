<?php

return [
    'SwalErrorSuccess' => [
        'success' => 'Succès',
        'error' => 'Erreur',
        'oups' => 'Oups',
        'confirmation' => 'Etes vous sûr ?'
    ],
    'LoginRegister' => [
        'title' => 'Inscription/Connexion',
        'loading' => 'Chargement...',
    ],
    'Login' => [
        'title' => 'Connexion',
        'indication' => 'Remplissez le formulaire pour vous connecter',
        'email_placeholder' => 'Email',
        'password_placeholder' => 'Mot de passe',
        'login_button' => 'Se Connecter',
        'remember_me' => 'Se souvenir de moi',
        'forgot_password' => 'Mot de passe oublié',
        'not_yet_registered' => 'Vous n\'avez pas encore de compte ?',
        'register_link' => 'Inscrivez-vous',
        'success_message' => 'Vous êtes maintenant connecté !',
        'error_message' => 'Une erreur est survenue lors de la connexion',
        'invalid_credentials' => 'Identifiants invalides',
        'not_activated' => 'Votre compte n\'est pas activé',
        'account_deleted' => 'Votre compte a été supprimé',
        'email_required' => 'Veuillez entrer votre email',
        'email_email' => 'L\'adresse email est invalide',
        'password_required' => 'Veuillez entrer votre mot de passe',
        'logout' => 'Déconnexion'

    ],
    'Register' => [
        'title' => 'Inscription',
        'indication' => 'Remplissez le formulaire pour vous inscrire.',
        'email_placeholder' => 'Email',
        'password_placeholder' => 'Mot de passe',
        'name_placeholder' => 'Nom Complet',
        'confirm_password_placeholder' => 'Confirmer le mot de passe',
        'show_password' => 'Afficher le mot de passe',
        'hide_password' => 'Cacher le mot de passe',
        'register_button' => 'S\'inscrire',
        'i_agree' => 'J\'accepte les',
        'terms_and_conditions' => 'Termes et Conditions d\'utilisation',
        'already_registered' => 'Vous avez déjà un compte ?',
        'login_link' => 'Connectez-vous',
        'success_message' => 'Votre compte a bien été créé !',
        'error_message' => 'Une erreur est survenue lors de la création de votre compte.',
        'something_went_wrong' => 'Une erreur est survenue.',
        'name_required' => 'Veuillez entrer votre nom.',
        'email_required' => 'Veuillez entrer votre email.',
        'email_email' => 'L\'adresse email est invalide.',
        'email_unique' => 'Cette adresse email est déjà utilisée.',
        'email_max' => 'Votre email ne doit pas dépasser 255 caractères.',
        'password_required' => 'Veuillez entrer votre mot de passe.',
        'password_min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password_max' => 'Le mot de passe ne doit pas dépasser 255 caractères.',
        'confirmPassword_required' => 'Veuillez confirmer le mot de passe.',
        'confirmPassword_same' => 'La confirmation du mot de passe ne correspond pas au mot de passe.',
        'agree_required' => 'Vous devez accepter les Termes et Conditions.',
    ],
    'ResetPassword' => [
        'forgot_password_indication' => 'Remplissez le formulaire pour réinitialiser votre mot de passe.',
        'reset_password' => 'Réinitialiser le mot de passe',
        'reset_password_indication' => 'Remplissez le formulaire pour réinitialiser votre mot de passe.',
        'reset_password_success' => 'Votre mot de passe a été réinitialisé avec succès.',
        'reset_password_error' => 'Une erreur est survenue lors de la réinitialisation du mot de passe.',
        'reset_password_email_subject' => 'Réinitialisation du mot de passe',
    ],
    'ShowHidePasswordMessages' => [
        'show_password' => 'Afficher le mot de passe',
        'hide_password' => 'Cacher le mot de passe',
    ],
    'WelcomeEmail' => [
        'title' => 'Bienvenue sur ' . env('APP_NAME'),
        'header' => 'Bienvenue sur ',
        'body' => 'Merci d\'avoir créé un compte sur notre plateforme. Veuillez vous connecter avec votre email et votre mot de passe, afin de remplir votre profil et d\'activer votre compte bancaire.'
    ],
    'verificationEmail' => [
        'title' => 'Vérification de l\'email lié à votre compte ' . env('APP_NAME'),
        'header' => 'Vérification de l\'email lié à votre compte ' . env('APP_NAME'),
        'body' => 'Veuillez cliquer le bouton ci-dessous pour vérifier votre email.',
        'button_text' => 'Vérifier Email'
    ],
    'email' => [
        'emailFooter' => 'Cordialement, l\'équipe ' . env('APP_NAME'),
    ],

    'emailVerify' => [
        'verify_instructions' => 'Vérifiez votre adresse e-mail.',
        'link_sent_message' => 'Un nouveau lien de vérification a été envoyé à votre adresse électronique.',
        'type_in_email' => 'Avant de poursuivre, veuillez vérifier votre boite de réception pour obtenir un lien de vérification.',
        'not_receive_email' => 'Si vous n\'avez pas reçu l\'email',
        'request_another' => 'cliquez ici pour renvoyer un autre'
    ],
    'newUserEmail' => [
        'title' => 'Nouveau Client',
        'message' => 'Vous avez un nouveau client inscrit sur votre plateforme. Veuillez vous connecter pour le manager.'
    ]
];