function confirmLogout() {
    Swal.fire({
        title: 'Confirmation',
        text: 'Êtes-vous sûr de vouloir vous déconnecter?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#343a40',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, déconnectez-moi!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Rediriger vers la route de déconnexion
            window.location.href = '/logout';
        }
    });
}