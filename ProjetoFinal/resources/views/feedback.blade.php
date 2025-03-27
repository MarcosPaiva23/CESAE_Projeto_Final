@extends('layout.main_layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login&register.css') }}">

<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Auth::check())
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                    </ol>
                </nav>

                <div class="card" style="min-height: fit-content;">
                    <div class="card-header cesae-purple text-white">
                        <h4 class="mb-0">Deixa aqui o teu feedback</h4>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        @error('error')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf

                            {{-- email --}}
                            <div class="mb-3">
                                <label class="form-label">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                            </div>

                            {{-- subject --}}
                            <div class="mb-3">
                                <label class="form-label">Assunto: </label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>

                            {{-- comment --}}
                            <div class="mb-3">
                                <label class="form-label">Comentários: </label>
                                <textarea class="form-control" id="comment" name="comment" style="height: 100px" required></textarea>
                            </div>

                            {{-- submit button --}}
                            <div class="d-grid">
                                <button type="submit" class="btn cesae-blue">Enviar Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <img src="{{ asset('img/warning.png') }}" alt="Warning" class="icon-login me-2">
                    <span>Precisas de fazer <a href="{{ route('login') }}">login</a> para deixares feedback.</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
 