@extends('layouts.public')

@section('title', 'Dettagli')

@section('content')
<div class="container">
    <div class="details">
        <h1>{{ $offer->titolo }}</h1>
        <div class="imgdet">
            @include('helpers/offerImg', ['attrs' => 'imgsize', 'imgFile' => $offer->immagine])
        </div>
        <div class="descr">
            {{ $offer->descrizione }}
        </div>
        <div class="tablecar">
            <table>
                <tr>
                    <th colspan="2">Informazioni di base</th>
                </tr>
                <tr>
                    <td>Indirizzo</td>
                    <td>
                        {{ $offer->citta }}, {{ $offer->via }} {{ $offer->civico }}
                    </td>
                </tr>
                <tr>
                    <td>Tipologia</td>
                    @if($offer->tipologia == 0)
                    <td>Appartamento</td>
                    @else
                    <td>Posto letto
                        @if($offer->posti_camera == 1)
                        in camera singola
                        @elseif($offer->posti_camera == 2)
                        in camera doppia
                        @endif
                    </td>
                    @endif
                </tr>
                <tr>
                    <td>Canone di affitto</td>
                    <td>{{ number_format($offer->prezzo, 2, ',', '.') }} €</td>
                </tr>
                <tr>
                    <td>Periodo di disponibilità</td>
                    <td>
                        @include('helpers/dateFormatter', ['inizio' => $offer->disponibilita_inizio, 'fine' => $offer->disponibilita_fine])
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Vincoli sullo studente</th>
                </tr>
                <tr>
                    <td>Età massima studente</td>
                    @isset($offer->eta_max)
                    <td>{{ $offer->eta_max }} anni</td>
                    @else
                    <td>Nessun vincolo</td>
                    @endisset
                </tr>
                <tr>
                    <td>Età minima studente</td>
                    @isset($offer->eta_min)
                    <td>{{ $offer->eta_min }} anni</td>
                    @else
                    <td>Nessun vincolo</td>
                    @endisset
                </tr>
                <tr>
                    <td>Genere studente</td>
                    @isset($offer->genere_locatario)
                    @if($offer->genere_locatario == 0)
                    <td>Uomo</td>
                    @else
                    <td>Donna</td>
                    @endif
                    @else
                    <td>Nessun vincolo</td>
                    @endisset
                </tr>
                <tr>
                    <th colspan="2">Caratteristiche dell'alloggio</th>
                </tr>
                @isset($offer->sup_appartamento)
                <tr>
                    <td>Superficie dell'appartamento</td>
                    <td>
                        {{ $offer->sup_appartamento }} mq
                    </td>
                </tr>
                @endisset
                @isset($offer->num_camere)
                <tr>
                    <td>Numero di camere nell'alloggio</td>
                    <td>
                        {{ $offer->num_camere }}
                    </td>
                </tr>
                @endisset
                @isset($offer->sup_camera)
                <tr>
                    <td>Superficie della camera</td>
                    <td>
                        {{ $offer->sup_camera }} mq
                    </td>
                </tr>
                @endisset
                @isset($offer->posti_camera)
                <tr>
                    <td>Posti letto nella camera</td>
                    <td>
                        {{ $offer->posti_camera }}
                    </td>
                </tr>
                @endisset
                <tr>
                    <td>Posti letto totali nell'alloggio</td>
                    <td>
                        {{ $offer->posti_tot }}
                    </td>
                </tr>
                @isset($offer->angolo_studio)
                <tr>
                    <td>Angolo Studio</td>
                    @if($offer->angolo_studio)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                @endisset
                <tr>
                    <td>Climatizzazione</td>
                    @if($offer->climatizzazione)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                <tr>
                    <td>Connessione a Internet</td>
                    @if($offer->connessione_internet)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                @isset($offer->cucina)
                <tr>
                    <td>Cucina</td>
                    @if($offer->cucina)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                @endisset
                @isset($offer->locale_ricreativo)
                <tr>
                    <td>Locale ricreativo</td>
                    @if($offer->locale_ricreativo)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                @endisset
                <tr>
                    <th colspan="2">Servizi disponibili nelle vicinanze</th>
                </tr>
                <tr>
                    <td>Parcheggi</td>
                    @if($offer->parcheggi)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                <tr>
                    <td>Farmacia</td>
                    @if($offer->farmacia)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                <tr>
                    <td>Supermercato</td>
                    @if($offer->supermercato)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                <tr>
                    <td>Ristorazione</td>
                    @if($offer->ristorazione)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
                <tr>
                    <td>Trasporti pubblici</td>
                    @if($offer->trasporti)
                    <td>
                        @include('icons/checkmark')
                    </td>  
                    @else
                    <td></td> 
                    @endif
                </tr>
            </table>           
        </div>
        @can('isLocatario')
        @if(!$flag)
        @isset($option)
        <div class="row">
            <div class="col-md-12">
                <div class="option-buttons flex-center">
                    <ul>

                        <li class="laipresa" >L'hai già opzionata</li>
                        <li><a href="#">&emsp;Chat&emsp;</a></li>

                    </ul>
                </div>
            </div>
        </div>            
        @else        
        <div class="row">
            <div class="col-md-12 flex-center">
                <div class="option-buttons">
                    <ul>
                        <li><a href="{{ route('details.option', [$offer->offerta_id] ) }}">Opziona</a></li>
                        <li><a href="#"> Chat </a></li>
                    </ul>
                </div>
            </div>
        </div>       

        @endisset

        @else
        <div class="row">
            <div class="col-md-12 flex-center">
                <div class="option-buttons">
                    <ul>
                        <li><a href="{{ route('register') }}">&emsp;Chat&emsp;</a></li>
                    </ul>
                </div>
            </div>
        </div>  
        @endif
        @endcan

        @guest
        <div class="row">
            <div class="col-md-12 flex-center">
                <div class="option-buttons">
                    <ul>
                        <li><a href="{{ route('register') }}"> Opziona </a></li>
                        <li><a href="{{ route('register') }}">&emsp;Chat&emsp;</a></li>
                    </ul>
                </div>
            </div>
        </div>  
        @endguest

    </div>
</div>
@endsection
