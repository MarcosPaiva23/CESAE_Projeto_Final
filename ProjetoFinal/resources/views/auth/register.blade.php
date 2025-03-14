@extends('layout.main_layout')

@section('content')
    <form method="POST" action="{{ route('users.create') }}" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div class="mb-3">
            <label class="form-label">Nome: </label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <p class="form-error">Nome invalido</p>
            @enderror
        </div>
        {{-- email --}}
        <div class="mb-3">
            <label  class="form-label">Email: </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email de aluno do cesae">
            @error('email')
                <p class="form-error">Email invalido</p>
            @enderror
        </div>
        {{-- password --}}
        <div class="mb-3">
            <label  class="form-label">Password: </label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <p class="form-error">Password invalida</p>
            @enderror
        </div>
        {{-- course --}}
        <div class="mb-3">
            <label  class="form-label">Curso que frequenta: </label>
            <input type="text" class="form-control" id="course" name="course">
            @error('course')
                <p class="form-error">Curso invalido</p>
            @enderror
        </div>
        {{-- data de cconclusao do curso --}}
        <div class="mb-3">
            <label  class="form-label">Data de conclusão do curso: </label>
            <input type="date" class="form-control" id="completion_date" name="completion_date">
            @error('completion_date')
                <p class="form-error">Data invalida</p>
            @enderror
        </div>
        {{-- horario --}}
        <div class="mb-3">
            <label  class="form-label">Horário: </label>
            <select class="form-control" name="Schedule" id="Schedule">
                <option value="0">Laboral</option>
                <option value="1">Pós-Laboral</option>
            </select>
            @error('Schedule')
                <p class="form-error">Escolha invalida</p>
            @enderror
        </div>
        {{-- se tem carro --}}
        <div class="mb-3">
            <label  class="form-label">Boleia: </label>
            <select class="form-control" name="have_car" id="have_car">
                <option value="0">Quero boleia</option>
                <option value="1">Quero dar boleia</option>
            </select>
            @error('have_car')
                <p class="form-error">Escolha invalida<p
            @enderror
        </div>
        {{-- Codigo Postal --}}
        <div class="mb-3">
            <label  class="form-label">Codigo postal: </label>
            <div class="row">
                <div class="col-2 text-center">
                    <input type="text" class="form-control" id="Postcode_first4" name="Postcode_first4" maxlength="4">
                </div>

                <div class="col-1 text-center">
                    <input type="text" class="form-control" id="Postcode_last3" name="Postcode_last3" maxlength="3">
                </div>
            </div>
            @error('Postcode_first4')
                <p class="form-error">Primeiros 4 digitos invalidos</p>
            @enderror
            @error('Postcode_last3')
                <p class="form-error">Ultimos 3 digitos invalidos</p>
            @enderror
        </div>
        {{-- checkbox for the days --}}
        <div class="mb-3">
            <label  class="form-label">Dias com disponivilidade ou que quer boleia: </label>
            <div class="row text-center">
                <div class="col">
                    <label class="form-check-label" for="exampleCheck1"> <input type="checkbox" class="form-check-input" id="monday" name="monday"> Segunda</label>
                </div>
                <div class="col">
                    <label class="form-check-label" for="exampleCheck1"> <input type="checkbox" class="form-check-input" id="tuesday" name="tuesday"> Terça</label>
                </div>
                <div class="col">
                    <label class="form-check-label" for="exampleCheck1"> <input type="checkbox" class="form-check-input" id="wednesday" name="wednesday"> Quarta</label>
                </div>
                <div class="col">
                    <label class="form-check-label" for="exampleCheck1"> <input type="checkbox" class="form-check-input" id="thursday" name="thursday"> Quinta</label>
                </div>
                <div class="col">
                    <label class="form-check-label" for="exampleCheck1"> <input type="checkbox" class="form-check-input" id="friday" name="friday"> Sexta</label>
                </div>
            </div>
        </div>
        {{-- user image --}}
        <div class="mb-3">
            <label  class="form-label">Foto de perfil: </label>
            <input type="file" class="form-control" id="photo" name="photo" accept="/image">
            @error('photo')
                <p class="form-error">Foto invalida<p
            @enderror
        </div>
        {{-- checkbox for condition accept --}}
        <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="cb_accept" name="cb_accept">
            <label class="form-check-label" for="exampleCheck1">Termos e condições de uso.</label>
            @error('cb_accept')
                <br><p class="form-error">É necessario aceitar os termos</p>
            @enderror
        </div>
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary">Criar conta</button>
    </form>
    <br>
@endsection