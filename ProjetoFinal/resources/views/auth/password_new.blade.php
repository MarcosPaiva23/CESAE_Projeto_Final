@extends('layout.main_layout')

@section('content')

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        {{-- email hidden for better security--}}
        <div class="mb-3">
            <input type="hidden" class="form-control" id="email" name="email" value="{{ request()->email }}"  readonly>
            @error('email')
                Email invalido
            @enderror
        </div>
        {{-- new password --}}
        <div class="mb-3">
            <label  class="form-label">Password: </label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                Password invalida
            @enderror
        </div>
        {{-- repeat new password --}}
        <div class="mb-3">
            <label  class="form-label">Password: </label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
                Password invalida
            @enderror
        </div>
        <br><br>
        {{-- token hidden for better security --}}
        <input type="hidden" name="token" id="" value="{{ request()->route('token') }}">
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary">Submeter</button>
    </form>
@endsection