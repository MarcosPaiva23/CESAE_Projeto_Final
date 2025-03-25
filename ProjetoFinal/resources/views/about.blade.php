@extends('layout.main_layout')
@section('content')

    <div class="container py-4">
        <h2 class="text-center mb-4">Bem-vindo ao CESAE Boleias!</h2>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="conteudo">
                            <p>O<strong> CESAE Boleias</strong> é uma aplicação inovadora desenvolvida com o objetivo de facilitar a partilha de transporte entre os alunos do CESAE. A plataforma permite que cada utilizador se registe, indicando o seu ponto de partida e se pretende oferecer ou pedir boleia, sendo assim possível combinar viagens com outros alunos que sigam o mesmo percurso.</p>
                            <p>Este projeto, centrado na criação de um site funcional e intuitivo, facilita a mobilidade, fomenta a colaboração entre os estudantes e promove a sustentabilidade, reduzindo a pegada ecológica.</p>

                            <h3 class="mt-4 mb-3">Funcionalidades incluídas:</h3>
                            <ul class="mb-4">
                                <li class="py-2"><strong>Sistema de Match Inteligente:</strong> A aplicação cruza automaticamente os dados dos utilizadores e sugere as melhores boleias compatíveis na área pessoal de cada aluno.</li>
                                <li class="py-2"><strong>Marcação de Boleias:</strong> Os utilizadores podem marcar boleias para dias e horários específicos, com a confirmação final por parte da pessoa que oferece a boleia.</li>
                                <li class="py-2"><strong>Gestão Personalizada:</strong> Cada utilizador terá acesso a uma área pessoal onde pode gerir as suas boleias, visualizar sugestões e comunicar com outros participantes.</li>
                                <li class="py-2"><strong>Feedback:</strong> Sistema de avaliação para garantir segurança e confiança entre os participantes.</li>
                            </ul>

                            <h3 class="mt-4 mb-3">Funcionalidades/Possibilidades futuras:</h3>
                            <ul class="mb-4">
                                <li class="py-2">Integração de notificações para lembrar os utilizadores das boleias agendadas.</li>
                                <li class="py-2">Expansão para incluir funcionalidades como cálculo de partilha de custos ou rotas alternativas.</li>
                                <li class="py-2">Outras funcionalidades podem surgir, dependendo das necessidades dos utilizadores e das melhorias a serem implementadas na plataforma.</li>
                            </ul>

                            <p class="mt-4">Com o CESAE Boleias, queremos simplificar as deslocações, promover a partilha de viagens entre alunos, promovendo uma comunidade mais unida e um deslocamento mais eficiente e sustentável.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection