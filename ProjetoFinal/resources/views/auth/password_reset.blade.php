@extends('layout.main_layout')

@section('content')
    
    @if (@session('status'))
        <div class="alert alert-success text-center">
            <h3>Iremos enviar um email para recuperação da password</h3>
        </div>
        <br>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        

        {{-- email --}}
        <div class="mb-3">
            <label  class="form-label">Email: </label>
            <input type="email" class="form-control" id="email" name="email">
            {{-- email error show --}}
        @error('email')
            Email invalido
        @enderror
        </div>
        
        <br>
        
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary">Submeter</button>
    </form>
@endsection