@extends('layout.main_layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/login&register.css') }}">

    <div class="container mt-4 admin-form-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header cesae-purple text-white">
                        <h4 class="mb-0">Criar Nova Conta</h4>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('users.create') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- coluna da esquerda -->
                                <div class="col-md-6">
                                    {{-- nome --}}
                                    <div class="mb-3">
                                        <label class="form-label">Nome: </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger">Nome inválido</p>
                                        @enderror
                                    </div>

                                    {{-- email --}}
                                    <div class="mb-3">
                                        <label class="form-label">Email: </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email de aluno do CESAE" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-danger">Email inválido</p>
                                        @enderror
                                    </div>

                                    {{-- password --}}
                                    <div class="mb-3">
                                        <label class="form-label">Password: </label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        @error('password')
                                            <p class="text-danger">Password inválida</p>
                                        @enderror
                                    </div>

                                    {{-- curso --}}
                                    <div class="mb-3">
                                        <label class="form-label">Curso que frequentas: </label>
                                        <input type="text" class="form-control" id="course" name="course"
                                            value="{{ old('course') }}">
                                        @error('course')
                                            <p class="text-danger">Curso inválido</p>
                                        @enderror
                                    </div>

                                    {{-- data de conclusao do curso --}}
                                    <div class="mb-3">
                                        <label class="form-label">Data de conclusão do curso: </label>
                                        <input type="date" class="form-control" id="completion_date"
                                            name="completion_date" value="{{ old('completion_date') }}">
                                        @error('completion_date')
                                            <p class="text-danger">Data inválida</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Coluna da direita -->
                                <div class="col-md-6">
                                    {{-- horario --}}
                                    <div class="mb-3">
                                        <label class="form-label">Horário: </label>
                                        <select class="form-select" name="Schedule" id="Schedule">
                                            <option value="0" {{ old('Schedule') == '0' ? 'selected' : '' }}>Laboral
                                            </option>
                                            <option value="1" {{ old('Schedule') == '1' ? 'selected' : '' }}>
                                                Pós-Laboral</option>
                                        </select>
                                        @error('Schedule')
                                            <p class="text-danger">Escolha inválida</p>
                                        @enderror
                                    </div>

                                    {{-- se tem carro --}}
                                    <div class="mb-3">
                                        <label class="form-label">Boleia: </label>
                                        <select class="form-select" name="have_car" id="have_car">
                                            <option value="0" {{ old('have_car') == '0' ? 'selected' : '' }}>Quero
                                                boleia</option>
                                            <option value="1" {{ old('have_car') == '1' ? 'selected' : '' }}>Quero dar
                                                boleia</option>
                                        </select>
                                        @error('have_car')
                                            <p class="text-danger">Escolha inválida</p>
                                        @enderror
                                    </div>

                                    {{-- Codigo Postal --}}
                                    <div class="mb-3">
                                        <label class="form-label">Código postal: </label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="Postcode_first4"
                                                    name="Postcode_first4" maxlength="4"
                                                    value="{{ old('Postcode_first4') }}" placeholder="0000">
                                            </div>
                                            <div class="col-1 text-center pt-2">-</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" id="Postcode_last3"
                                                    name="Postcode_last3" maxlength="3"
                                                    value="{{ old('Postcode_last3') }}" placeholder="000">
                                            </div>
                                        </div>
                                        @error('Postcode_first4')
                                            <p class="text-danger">Primeiros 4 dígitos inválidos</p>
                                        @enderror
                                        @error('Postcode_last3')
                                            <p class="text-danger">Últimos 3 dígitos inválidos</p>
                                        @enderror
                                    </div>

                                    {{-- foto --}}
                                    <div class="mb-3">
                                        <label class="form-label">Foto de perfil: </label>
                                        <input type="file" class="form-control" id="photo" name="photo"
                                            accept="image/*">
                                        @error('photo')
                                            <p class="text-danger">Foto inválida</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- checkbox dos dias --}}
                            <div class="mb-3">
                                <label class="form-label">Dias em que planeias usar o serviço: </label>
                                <div class="row row-cols-5 g-2">
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="monday"
                                                name="monday" {{ old('monday') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="monday">Segunda</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="tuesday"
                                                name="tuesday" {{ old('tuesday') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tuesday">Terça</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="wednesday"
                                                name="wednesday" {{ old('wednesday') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="wednesday">Quarta</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="thursday"
                                                name="thursday" {{ old('thursday') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="thursday">Quinta</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="friday"
                                                name="friday" {{ old('friday') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="friday">Sexta</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- checkbox dos termos e condições --}}
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="cb_accept" name="cb_accept"
                                    {{ old('cb_accept') ? 'checked' : '' }}>
                                <label class="form-check-label" for="cb_accept">Aceito os termos e condições de
                                    uso.</label>
                                @error('cb_accept')
                                    <p class="text-danger">É necessário aceitar os termos</p>
                                @enderror
                            </div>

                            {{-- submit --}}
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn cesae-blue">Criar Conta</button>
                            </div>

                            <div class="mt-3 text-center">
                                <p>Já tens uma conta? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
