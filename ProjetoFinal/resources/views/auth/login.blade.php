@extends('layout.main_layout')

@section('content')

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
        {{-- password forgotten link --}}
        <a href="{{ route('password.request')}}">Esqueci-me da password</a>
        <br><br>
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection