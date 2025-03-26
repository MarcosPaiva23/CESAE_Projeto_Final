@extends('layout.main_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">


<div class="container mt-4">
    <div class="card">
        <div class="card-header cesae-purple text-white">
            <h4 class="mb-0">Gestão de Utilizadores</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Curso</th>
                            <th>Tem Carro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if ($user->foto)
                                    <img src="{{ asset('storage/' . $user->foto) }}" class="table-image">
                                @else
                                    <img src="{{ asset('img/no-photo.jpg') }}" class="table-image">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->curso }}</td>
                            <td>{{ $user->tem_carro ? 'Sim' : 'Não' }}</td>
                            <td><a class="btn btn-danger" href={{ route('blockUserAccess', $user->id) }}>Bloquear Acesso</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
