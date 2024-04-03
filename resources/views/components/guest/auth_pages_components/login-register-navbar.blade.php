<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ url('/') }}">
            {{ env('APP_NAME') }}
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-4">
                <li class="nav-item" @class(['active' => !$showLogin])>
                    <a class="nav-link" href="" wire:click.prevent="showRegisterForm">
                        <i class="fas fa-user-circle opacity-6 me-1"></i>
                        {{ __('login-register-messages.Register.title') }}
                    </a>
                </li>

                <li class="nav-item" @class(['active' => $showLogin])>
                    <a class="nav-link " href="" wire:click.prevent="showLoginForm">
                        <i class="fas fa-key opacity-6 me-1"></i>
                        {{ __('login-register-messages.Login.title') }}
                    </a>
                </li>
                <style>
                    /* Ajoutez la couleur foncée souhaitée */
                    .nav-item.active {
                        background-color: #333;
                        /* Remplacez cela par votre couleur foncée */
                        color: #fff;
                        /* Remplacez cela par votre couleur de texte */
                    }
                </style>
            </ul>
        </div>
    </div>
</nav>
