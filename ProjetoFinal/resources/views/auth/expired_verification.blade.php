@extends('layout.main_layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h2>Tempo expirado!</h2>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                        @endif

                        <p>Antes de poderes usar a tua conta, precisas de verifivar o email.</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <input type="hidden" name="hash" id="hash" value="{{ $hash }}">
                            <input type="hidden" name="id" id="id" value="{{ $id }}">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clica aqui para reinviar o email de validação</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection