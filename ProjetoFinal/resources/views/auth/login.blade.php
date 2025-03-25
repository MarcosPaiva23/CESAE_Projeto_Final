@extends('layout.main_layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login&register.css') }}">


<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="min-height: fit-content;">
                <div class="card-header cesae-purple text-white">
                    <h4 class="mb-0">Login</h4>
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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- error show if the credentials are not correct --}}
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                Credenciais incorretas
                            </div>
                        @enderror

                        {{-- email --}}
                        <div class="mb-3">
                            <label class="form-label">Email: </label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        {{-- password --}}
                        <div class="mb-3">
                            <label class="form-label">Password: </label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        {{-- Remember me checkbox --}}
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Lembrar-me</label>
                        </div>

                        {{-- submit button --}}
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn cesae-blue">Login</button>
                        </div>
                        <div class="text-center mt-2">
                            <a href="{{ route('password.request') }}" class="text-decoration-none d-block">Esqueci-me da password</a>
                            <a href="{{ route('register') }}" class="text-decoration-none d-block mt-1">Criar nova conta</a>
                        </div>
                    </form>
                </div>
            </div>

    {{-- To show messages and erros coming from other pages o redirect to home --}}
    @if (session('message'))
    <div class="alert alert-success text-center">
        <h3>{{session('message')}}</h3>
    </div>
    <br>
    @endif

    @error('error')
        <div class="alert alert-danger text-center">
            <h3>{{ $message }}</h3>
        </div>
        <br>
    <br>
    @enderror
    


    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- error show if the credentials are not correct --}}
        @error('email')
            <div class="alert alert-danger" role="alert">
                Credenciais incorretas
            </div>
            <br>
        @enderror

        {{-- email --}}
        <div class="mb-3">
            <label  class="form-label">Email: </label>
            <input type="email" class="form-control" id="email" name="email">

        </div>
        {{-- password --}}
        <div class="mb-3">
            <label  class="form-label">Password: </label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
</div>
@endsection
