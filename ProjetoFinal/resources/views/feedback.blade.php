@extends('layouts.fo_layout')
@section('content')

@auth
    <h5>Olá {{ Auth::user()->name }}</h5>
@endauth

<h4>Deixe aqui o seu feedback da viagem:</h4>

<br><br>

<form action="{{ route('feedback.store') }}" method="POST">
    @csrf

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" name="email" value="{{ Auth::user()->email ?? '' }}" readonly>
        <label for="floatingInput">Email:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="Insira o assunto" id="floatingTextarea" name="assunto" required>
        <label for="floatingTextarea">Assunto:</label>
    </div>

    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Insira o seu comentário" id="floatingTextarea2" name="comentario" style="height: 100px" required></textarea>
        <label for="floatingTextarea2">Comentários:</label>
    </div>

    <button type="submit" class="btn btn-primary">Enviar Feedback</button>
</form>

@endsection
