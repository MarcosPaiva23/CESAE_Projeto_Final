<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CESAE Boleias</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/cesae_boleias_normal.png') }}">

    {{-- bottstrap --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    {{-- css main --}}
    <link rel="stylesheet" href="{{ asset('css/css2.css') }}">

</head>

<body>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">

                <a class="navbar-brand mx-auto" href="/">
                    <img src="{{ asset('img/cesae_boleias_full.png') }}" alt="CESAE Digital Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">Sobre</a>
                        </li>

                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->is_admin == 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin">Dashboard</a>
                                    </li>
                                @else
                                    @if (Auth::user()->is_blocked == 0)
                                        @if (Auth::user()->tem_carro == 1)
                                            <li class="nav-item">
                                                <a class="nav-link" href="/dashboard-condutor">Matches</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="/dashboard-passageiro">Matches</a>
                                            </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">Definições</a>
                                        </li>
                                    @endif
                                @endif

                                <form name="logout" id="logout" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a class="nav-link" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                                </form>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="/register">Registar</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        {{-- container to insert the blades template --}}
        <br>
        <div class="container body-div">
            {{-- call for the content to show --}}
            @yield('content')
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="{{ asset('img/cesae_boleias_normal.png') }}" alt="CESAE Digital Logo">
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Links Úteis</h5>
                    <br>
                    <ul class="list-unstyled">
                        <li><a href="https://www.cesaedigital.pt/" class="text-white">CESAE Digital</a></li>
                        <li><a href="/feedback" class="text-white">Feedback</a></li>
                        <li><a href="/terms" class="text-white">Termos de Uso</a></li>
                        <li><a href="/privacy" class="text-white">Política de Privacidade</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contactos</h5>
                    <br>
                    <p>Se tiveres dúvidas ou sugestões, entra em contacto connosco!</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/CesaeDigital/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/cesae.digital/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/school/cesae-digital/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4" style="background-color: white;">
            <div class="row">
                <div class="col text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} CESAE Boleias. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    @auth
        @include('settings_modal')
    @endauth

    <script src="{{ asset('js/settings.js') }}"></script>
</body>
</html>
