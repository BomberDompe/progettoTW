@extends('layouts.private')

@section('title', 'Account')

@section('content')
<div class="container">
    <div class="inner-container">
        <h3>Area Utente</h3>
        @can('isRegisteredUser')
        <p>Benvenuto, {{ Auth::user()->name }} {{ Auth::user()->surname }}!</p>
        @else
        <p>Benvenuto nell'area amministratore!
        @endcan
        <p>Seleziona la funzionalità da attivare dal menù laterale </p>
    </div>
</div>
@endsection


