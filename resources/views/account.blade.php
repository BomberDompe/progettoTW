@extends('layouts.private')

@section('title', 'Account')

@section('content')
<div class="container">
    <h3>Area Utente</h3>
    <p>Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
    <p>Seleziona la funzione da attivare</p>
</div>
@endsection


