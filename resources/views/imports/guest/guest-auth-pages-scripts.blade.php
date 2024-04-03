<script>
    var showPasswordMessage = '{{ __('login-register-messages.ShowHidePasswordMessages.show_password') }}';
    var hidePasswordMessage = '{{ __('login-register-messages.ShowHidePasswordMessages.hide_password') }}'
    console.log(showPasswordMessage, hidePasswordMessage);

    // Votre autre code JavaScript...
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script href={{ asset('theme/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}></script>
<!--   Core JS Files   -->
<script href={{ asset('theme/assets/js/core/popper.min.js') }}></script>
<script href={{ asset('theme/assets/js/core/bootstrap.min.js') }}></script>
<script href={{ asset('theme/assets/js/plugins/perfect-scrollbar.min.js') }}></script>
<script href={{ asset('theme/assets/js/plugins/smooth-scrollbar.min.js') }}></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src={{ asset('js/swal.js') }}></script>
<script src={{ asset('js/toggle-mobile-menu.js') }}></script>
<script src={{ asset('js/show-hide-password.js') }}></script>
