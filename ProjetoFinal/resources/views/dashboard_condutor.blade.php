@extends('layout.main_layout')
@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard_condutor_passageiro.css') }}">
    <h1 class="fonteBold mt-5 text-center">Dashboard Condutor</h1>

    <div class="container mt-4">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard Condutor</li>
            </ol>
        </nav>


        @foreach ($passengers as $currentPassenger)
            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex align-items-center">
                    {{-- Foto passageiro --}}
                    <img src="{{ $currentPassenger->foto }}" alt="Foto de {{ $currentPassenger->name }}"
                        class="img-fluid rounded-circle me-3" width="80" height="80">

                    {{-- Informações do passageiro --}}
                    <div class="flex-grow-1">
                        <h6 class="fonteBold mb-1">{{ $currentPassenger->name }}</h6>
                        <p class="mb-1 text-muted">{{ $currentPassenger->curso }}</p>
                        <p class="small text-muted">Distância: To be added</p>
                    </div>

                    {{-- Feedback, conversar --}}
                    <div>
                        <a class="btn btn-outline-primary me-2" href="{{ route('feedback.store') }}">Dar feedback</a>
                        <a class="btn btn-outline-secondary" href="#">Conversar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Botão para apagar conta -->
    <div class="text-center mt-4">
        <button type="button" class="btn btn-danger">Apagar conta</button>
    </div>

    <br>
    <br>
@endsection


{{-- Os comentários acima devem ser transformados em código real quando nós comçarmos a juntar as nossas partes do projecto. A intenção é fazer
com que apenas os usuários que estejam em um curso de horário igual ao do usuário logado apareçam na tabela --}}
