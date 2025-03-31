@extends('layout.main_layout')
@section('content')

<link rel="stylesheet" href="{{ asset('css/feedback.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="display: grid; grid-template-columns: auto max-content; align-items: center;">
                    <h2 class="mb-0">Detalhes do Feedback</h2>
                </div>


                <div class="card-body ">
                    <h5 class="card-subtitle mb-3">Feedback do Condutor</h5>
                    <h6 class="card-subtitle mb-2"> {{ $feedback->assunto }}</h6>
                    <h6 class="text-muted mb-3">Enviado por: {{ $feedback->user_email }} em {{ $feedback->created_at->format('d/m/Y H:i') }}</h6>

                    <div class="feedback-content p-3 bg-light rounded my-3">
                        {!! nl2br(e($feedback->comentario)) !!}
                    </div>

                    <div class="text-end" style="white-space: nowrap;">
                        <a href="{{ route('back_office.ver_feedback') }}" class="btn btn-info" style="display: inline-block; margin-right: 10px;">
                            <i class="fa fa-arrow-left"></i> Voltar
                        </a>
                        <form action="{{ route('back_office.ver_feedback.delete', $feedback->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja eliminar este feedback?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection