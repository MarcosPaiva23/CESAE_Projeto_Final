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
                @foreach ($conductors as $currentConductor)
                    <tr>
                        <td>{{ $currentConductor->foto }}</td>
                        <td>{{ $currentConductor->name }}</td>
                        <td>{{ $currentConductor->curso }}</td>
                        <td><a class="btn btn-info" href="">Dar feedback</a>
                            <a class="btn btn-info" href="">Conversar</a>
                        <td>
                @endforeach
                </tr>
            </tbody>
        </table>
        <br><br>
        <button type="button" class="btn btn-danger">Apagar conta</button>
    </div>
@endsection
