@extends('layout.main_layout')

@section('content')

<br>
<br>

        <div class="container-fluid text-center" style="width: 40%">
            @if (@session('status'))
                <div class="alert alert-success text-center">
                    <h3>Iremos enviar um email para recuperação da password</h3>
                </div>
                <br>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf



                {{-- email --}}
                <div class="mb-3 text-start">
                    <label  class="form-label">Email: </label>
                    <input type="email" class="form-control" id="email" name="email">
                    {{-- email error show --}}
                @error('email')
                    <p class="form-error">Email invalido</p>
                @enderror
                </div>

                <br>

                {{-- submit button --}}
                <button type="submit" class="btn btn-primary">Submeter</button>
            </form>
        </div>

@endsection
