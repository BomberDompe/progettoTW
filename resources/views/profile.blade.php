@extends('layouts.private')

@section('title', 'Profilo')

@section('content')

<div class="container">
    <div class="inner-container">
        <h3>Il tuo profilo</h3>
        <p>Visualizza e modifica i tuoi dati</p>
        
        <div class="">
            <div class="card">
                
                <p><span>{{Auth::user()->username}}</span></p>
                <div class="title">
                <p>Username: {{Auth::user()->username}}</p>
                <p>Tipo di account: {{Auth::user()->role}}</p>
                </div>
                @can("isRegisteredUser")
                <div class="paragraph">
                <p>Nome: {{ Auth::user()->name }}</p>
                <p>Cognome: {{ Auth::user()->surname }}</p>
                <p>Genere: {{Auth::user()->genere}}</p>
                <p>Data di nascita: {{date('d/m/Y', strtotime(Auth::user()->data_nascita))}}</p>
                @isset(Auth::user()->telefono)
                <p>Telefono: {{Auth::user()->telefono}}</p>
                @else
                <p>Telefono: [non specificato]</p>
                @endisset
                @isset(Auth::user()->comune_residenza)
                <p>Comune di residenza: {{Auth::user()->comune_residenza}}</p>
                @else
                <p>Comune di residenza: [non specificato]</p>
                @endisset
                </div>
                <a href="{{ route('profile.updateview') }}">Modifica</a>
                @endcan
            </div>
        </div>
        
    
    </div>
</div>


@endsection