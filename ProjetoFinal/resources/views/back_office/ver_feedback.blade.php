@extends('layout.main_layout')
@section('content')

<link rel="stylesheet" href="{{ asset('css/feedback.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h2-white">Gestão de Feedback</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Assunto</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feedbacks as $feedback)
                                    <tr>
                                        <td>{{ $feedback->id }}</td>
                                        <td>{{ $feedback->user_email }}</td>
                                        <td>{{ $feedback->assunto }}</td>
                                        <td>{{ $feedback->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('back_office.ver_feedback_especifico', $feedback->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Ver
                                            </a>
                                            <form action="{{ route('back_office.ver_feedback.delete', $feedback->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja eliminar este feedback?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhum feedback encontrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $feedbacks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
