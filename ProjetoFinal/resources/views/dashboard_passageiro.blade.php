@extends('layout.main_layout')
@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard_condutor_passageiro.css') }}">

<h1 class="fonteBold mt-5 text-center">Os Meus Matches</h1>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Passageiro</li>
        </ol>
    </nav>

    @foreach ($drivers as $currentDriver)
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center">
                {{-- Foto passageiro --}}
                <img src="{{ $currentDriver->foto }}" alt="Foto de {{ $currentDriver->name }}"
                    class="img-fluid rounded-circle me-3" width="80" height="80">

                {{-- Informações do passageiro --}}
                <div class="flex-grow-1">
                    <h6 class="fonteBold mb-1">{{ $currentDriver->name }}</h6>
                    <p class="mb-1 text-muted">{{ $currentDriver->curso }}</p>
                    <p class="small text-muted">Distância: To be added</p>
                </div>

                {{-- Feedback, conversar --}}
                <div>
                    <a class="btn cesae-purple" href="{{ route('feedback.store') }}">Dar feedback</a>
                    <a class="btn cesae-blue" href="#">Conversar</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection