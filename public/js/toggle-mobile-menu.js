document.addEventListener('DOMContentLoaded', function () {
    var button = document.querySelector('.navbar-toggler');
    var navigation = document.querySelector('#navigation');

    button.addEventListener('click', function () {
        // Passe la classe 'collapsed' au bouton
        button.classList.toggle('collapsed');
        
        // Change la valeur de 'aria-expanded' sur le bouton
        var isExpanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', !isExpanded);

        // Ajoute la classe 'show' à la navigation
        navigation.classList.toggle('show');
    });
});