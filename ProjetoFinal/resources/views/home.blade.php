@extends('layouts.fo_layout')
@section('content')
    <br>
    <h2>Bem-vindo!</h2>
    <br>

    <h5>O que pretendes fazer hoje?</h5>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <ul class="list-unstyled">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('dashboard.condutor') }}">Dashboard Condutor</a></li>
                    <li><a href="{{ route('dashboard.utilizador') }}">Dashboard Utilizador</a></li>
                    <li><a href="{{ route('feedback.create') }}">Deixar feedback</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
