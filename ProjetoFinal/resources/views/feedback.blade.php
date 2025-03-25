@extends('layout.main_layout')
@section('content')


<div class="icon-text-container">
    <img src="{{ asset('img/feedback.png') }}" alt="feedback" class="icon-feedback">
    <span class = "feedback"> Deixa aqui o teu feedback da viagem:</span>
    <img src="{{ asset('img/feedback.png') }}" alt="feedback" class="icon-feedback">
</div>



@if(Auth::check())

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
    </ol>
</nav>

<div class="d-flex justify-content-center align-items-center">

    <div class="col-md-6">
        <form action="{{ route('feedback.store') }}" method="POST" class="p-4 border rounded shadow bg-white">
            @csrf

        {{-- <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email"
                   value="{{ Auth::user()->email }}" readonly>
            <label for="floatingInput">Email:</label>
        </div> --}}

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email"
                   value="{{ Auth::check() ? Auth::user()->email : '' }}"
                   readonly>
            <label for="floatingInput">Email:</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Insira o assunto" id="floatingInput2" name="subject" required>
            <label for="floatingInput2">Assunto:</label>
        </div>

        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Insira o seu comentário" id="floatingTextarea2" name="comment" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Comentários:</label>
        </div>

        <button type="submit" class="btn btn-dark w-100">Enviar Feedback</button>
    </form>
</div>
</div>
@else
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <img src="{{ asset('img/warning.png') }}" alt="Warning" class="icon-login me-2">
        <span>Precisas de fazer <a href="{{ route('login') }}">login</a> para deixares um feedback.</span>
    </div>
@endif

<br>
<br>
@endsection
