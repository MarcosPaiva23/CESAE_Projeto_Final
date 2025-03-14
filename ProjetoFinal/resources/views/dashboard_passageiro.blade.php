@extends('layout.layout_marcos')
@section('content')
    <div class="row justify-content-center align-items-center">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Distância</th>
                    <th scope="col">Utilidades</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $currentDriver)
                    {{-- @auth
                        @if (Auth::user()->horario == $currentDriver->horario) --}}
                            <tr>
                                <td>{{ $currentDriver->foto }}</td>
                                <td>{{ $currentDriver->name }}</td>
                                <td>{{ $currentDriver->curso }}</td>
                                <td>To be added</td>
                                <td><a class="btn btn-info" href="">Dar feedback</a>
                                    <a class="btn btn-info" href="">Conversar</a>
                                <td>
                            </tr>
                        {{-- @endif
                    @endauth --}}
                @endforeach
            </tbody>
        </table>
        <br><br>
        <button type="button" class="btn btn-danger">Apagar conta</button>
    </div>
@endsection

{{-- Os comentários acima devem ser transformados em código real quando nós comçarmos a juntar as nossas partes do projecto. A intenção é fazer
com que apenas os usuários que estejam em um curso de horário igual ao do usuário logado apareçam na tabela --}}
