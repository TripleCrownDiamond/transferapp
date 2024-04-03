<?php

return [
    'loan_types' => [
        'personal' => 'Prêt personnel',
        'real_estate_loan' => 'Prêt immobilier',
        'car_loan' => 'Prêt automobile',
        'debt_refinancing' => 'Refinancement de dette',
        'health' => 'Prêt santé',
        'car_financing' => 'Financement automobile',
        'project_financing' => 'Financement de projet',
        'student' => 'Prêt étudiant',
        'business_loan' => 'Prêt professionnel',
        'credit_card' => 'Carte de crédit',
        'mortgage_loan' => 'Prêt hypothécaire',
        'emergency_loan' => 'Prêt d\'urgence',
        'payday_loan' => 'Prêt sur salaire',
        'education_loan' => 'Prêt étudiant',
    ],
    'loan_request' => [
        'profile_uncompleted' => 'Vous devez d\'abord remplir votre profil...',
        'request_title' => 'Demander un crédit',
        'amount' => 'Montant en',
        'type' => 'Type de crédit',
        'duration' => 'Durée du crédit (en mois)',
        'reason' => 'Raison de la demande',
        'submit' => 'Soumettre',
        'submitting' => 'Soumission...',
        'success' => 'Demande de crédit soumise avec succès',
        'select' => 'Sélectionner un type de crédit',
        'see_loans' => 'Voir mes demandes de crédit',
        'errors' => [
            'amount_required' => 'Le montant est requis.',
            'amount_numeric' => 'Le montant doit être numérique.',
            'amount_min' => 'Le montant doit être d\'au moins 1.',

            'type_required' => 'Le type est requis.',
            'type_exists' => 'Le type sélectionné est invalide.',

            'duration_required' => 'La durée est requise.',
            'duration_numeric' => 'La durée doit être numérique.',
            'duration_min' => 'La durée doit être d\'au moins 1 mois.',

            'reason_required' => 'La raison est requise.',
            'reason_string' => 'La raison doit être une chaîne de caractères.'
        ]
    ],
    'loans-list' => [
        'your_loans_requests' => 'Vos demandes de crédits',
        'name' => 'Nom du client',
        'accept' => 'Accepter',
        'reject' => 'Rejeter',
        'loans_requests' => 'Demandes de crédits',
        'no_loan_yet' => 'Vous n\'avez encore aucune demande de crédit.',
        'amount' => 'Montant du crédit',
        'duration' => 'Durée du crédit',
        'date' => 'Demandé le',
        'status' => 'Statut',
        'action' => 'Actions',
        'details' => 'Details',
        'pending' => 'En cours de traitement',
        'all' => 'Tout',
        'approved' => 'Approuvé',
        'rejected' => 'Rejeté',
        'history' => 'Historique des demandes',
        'month' => 'Mois',
        'delete' => 'Supprimer'
    ],
    'details' => [
        'general_infos' => 'Information générales sur le demandeur',
        'contact_infos' => 'Adresses et Contact du demandeur',
        "name" => 'Nom Complet',
        'sex' => 'Sexe',
        'birthdate' => 'Date de naissance',
        'profession' => 'Profession',
        'matrimonial' => 'Situation Matrimoniale',
        'monthly_income' => 'Revenu mensuel',
        'country' => 'Pays',
        'city' => 'Ville',
        'address' => 'Addresse',
        'email' => 'Email',
        'tel' => 'Téléphone',
        'credit_infos' => 'Détails du crédit',
        'date' => 'Demandé le',
        'type' => 'Type de crédit',
        'reason' => 'Raison de la demande',
        'amount' => 'Montant',
        'rate' => 'Taux d\'intérêt',
        'grace_period' => 'Période de grâce',
        'status' => 'Statut',
        'mensual_rate' => 'Taux d\'intérêt mensuel',
        'monthly_interest' => 'Montant de l\'intérêt mensuel',
        'total_interest' => 'Montant de l\'intérêt total',
        'monthly_payment' => 'Total dû par mois',
        'total_payment' => 'Total à payer',
        'credit_id' => 'Identifiant du crédit'
    ],
    'confirm_modal' => [
        'title' => 'Etes ous sûr ?',
        'message_approval' => 'Voulez vous approuver ce crédit ? La demande sera traitée comme approuvée.',
        'action_yes' => 'Approuver',
        'action_no' => 'Annuler',
        'loan_approved' => 'Demande de crédit approuvée',
        'loan_rejected' => 'Demande crédit rejetée',
        'loan_deleted' => 'Demande de crédit supprimée'
    ],
    'new_loan_email' => [
        'title' => 'Demande de crédit créée avec succès',
        'message' => 'Votre demande de crédit à été reçu avec succès. Et est en cours de traitement.',
        'details_label' => 'Voici les détails de votre crédit ci-dessous :',
        'action' => 'Veuillez vous connectez à votre compte dans la section Crédits pour voir plus de détails sur votre demande.'
    ],
    'super_admin_new_loan_email' => [
        'title' => 'Nouvelle demande de crédit',
        'message' => 'Vous avez une nouvelle demande de crédit sur votre plateforme.',
        'label' => 'Voici les détails du crédit ci-dessous :',
        'name' => 'Nom du client'
    ],
    'loan_approved_email' => [
        'title' => 'Demande de crédit acceptée',
        'message_part_1' => 'Votre crédit n° :',
        'message_part_2' => 'a été accepté.'
    ],
    'loan_rejected_email' => [
        'title' => 'Demande de crédit refusée',
        'message_part_1' => 'Votre crédit n° : ',
        'message_part_2' => 'a été refusé.'
    ]
];