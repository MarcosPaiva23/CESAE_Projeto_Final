@extends('layout.main_layout')
@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard_condutor_passageiro.css') }}">

<h1 class="fonteBold mt-5 text-center">Os Meus Matches</h1>

<div class="container mt-4" id="userscards">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Passageiro</li>
        </ol>
    </nav>

    <!-- Div do Preloader -->
    <div id="preloader">
        <br>
        <div class="spinner"></div>
        <br>
    </div>


</div>

<script>
    window.drivers = @json($drivers);

    window.address = @json($address);

    window.assets = "{{ asset('storage/') }}";

    window.noPhoto = "{{ asset('img/no-photo.jpg') }}";

    window.feedback = "{{ route('feedback.store') }}"
</script>

<script src="{{ asset("js/passengerView.js") }}"></script>

{{-- css animation --}}
<link rel="stylesheet" href="{{ asset('css/loading_animation.css') }}">


@endsection
