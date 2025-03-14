@extends('layout.layout_marcos')
@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Coluna Esquerda - Conteúdo -->
        <div class="col-md-6">
            <div class="conteudo">
                <br>
                <h6><img src="{{asset('img/ride-hailing.png')}}" alt="Ride" class="icon-ride">Bem-vindo ao CESAE Boleias!</h6>
                <br>

                <p>O CESAE Boleias é uma plataforma inovadora desenvolvida para facilitar a partilha de transporte entre os alunos do CESAE. Registe-se, indique o seu ponto de partida e escolha se deseja oferecer ou pedir boleia. Com o nosso sistema inteligente, é fácil encontrar alunos com rotas compatíveis e combinar viagens de forma prática e sustentável.</p>

                <h6 class="mt-4">Funcionalidades:</h6>
                <br>

                <ul>
                    <li><strong>Match Inteligente:</strong> Encontre automaticamente as melhores boleias.</li>
                    <li><strong>Agendamento de Boleias:</strong> Marque viagens para dias e horários específicos.</li>
                    <li><strong>Gestão Personalizada:</strong> Organize as suas boleias e comunique com outros participantes.</li>
                    <li><strong>Feedback:</strong> Avalie e garanta segurança e confiança.</li>
                </ul>
            </div>
        </div>

        <!-- Coluna Direita - Barra e Menu -->
        <div class="col-md-6">
            <div class="barra mt-4 text-center">
                <h5>O que pretendes fazer hoje?</h5>
            </div>

            <div class="menu mt-4">
                <div class="container text-center">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('feedback') }}">
                                <img src="{{ asset('img/seta.png') }}" alt="Arrow" class="icon-arrow">
                                Deixar feedback
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
