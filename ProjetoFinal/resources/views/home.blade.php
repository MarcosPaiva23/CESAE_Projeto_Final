@extends('layout.main_layout')
@section('content')



    {{-- To show messages and erros coming from other pages o redirect to home --}}
    @if (session('error'))
        <div class="alert alert-danger text-center">
            <h3>{{session('error')}}</h3>


        </div>
        <br>
    @endif

    @if (session('message'))
        <div class="alert alert-success text-center">
            <h3>{{ session('message') }}</h3>

        </div>
        <br>
    @endif

    <div class="container mt-4">
        <div class="row">
            <div class="col-md">
                <div class="conteudo">
                    <h6><img src="{{ asset('img/ride-hailing.png') }}" alt="Ride" class="icon-ride">Bem-vindo ao CESAE Boleias!</h6>
                    <br>

                    <p>O CESAE Boleias é uma plataforma inovadora desenvolvida para facilitar a partilha de transporte entre
                        os alunos do CESAE. Registe-se, indique o seu ponto de partida e escolha se deseja oferecer ou pedir
                        boleia. Com o nosso sistema inteligente, é fácil encontrar alunos com rotas compatíveis e combinar
                        viagens de forma prática e sustentável.</p>

                    <h6 class="mt-4">Funcionalidades:</h6>
                    <br>

                    <ul>
                        <li><strong>Match Inteligente:</strong> Encontre automaticamente as melhores boleias.</li>
                        <p>
                        <li><strong>Agendamento de Boleias:</strong> Marque viagens para dias e horários específicos.</li>
                        <p>
                        <li><strong>Gestão Personalizada:</strong> Organize as suas boleias e comunique com outros
                            participantes.</li>
                        <p>

                            <li><strong>Feedback:</strong> Avalie e garanta segurança e confiança.</li>


                    </ul>
                </div>
            </div>

            @if (Route::has('login'))
                @auth
                    <div class="col-md">
                        <div class="barra mt-4 text-center">
                            <h5>O que pretendes fazer hoje?</h5>
                        </div>

                        <div class="menu mt-2 justify-content-center align-items-center">
                            <div class="container text-center">
                                <ul class="list-unstyled d-inline-block text-start">


                                    @if(Auth::user()->is_admin == 1)
                                        {{-- Menu de Admin --}}
                                        <li>
                                            <a href="{{ route('admin_dashboard') }}">
                                                <img src="{{ asset('img/seta.png') }}" alt="Arrow" class="icon-arrow">
                                                Painel Administrador
                                            </a>
                                        </li>
                                    @else
                                        {{-- Menu de user normal --}}
                                        @if(Auth::user()->tem_carro == 0)
                                            <li>
                                                <a href="{{ route('showPassengerTable') }}">
                                                    <img src="{{ asset('img/seta.png') }}" alt="Arrow" class="icon-arrow">
                                                    Meus Matches (Passageiro)
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('showDriverTable') }}">
                                                    <img src="{{ asset('img/seta.png') }}" alt="Arrow" class="icon-arrow">
                                                    Meus Matches (Condutor)
                                                </a>
                                            </li>
                                        @endif

                                        <li>
                                            <a href="{{ route('feedback') }}">
                                                <img src="{{ asset('img/seta.png') }}" alt="Arrow" class="icon-arrow">
                                                Deixar Feedback
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">
                                                <img src="{{ asset('img/seta.png') }}" alt="Arrow" class="icon-arrow">
                                                Definições
                                            </a>
                                        </li>
                                    @endif

                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <img src="{{ asset('img/seta.png') }}" alt="Arrow" class="icon-arrow">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endauth
            @endif
        </div>
    </div>
@endsection
