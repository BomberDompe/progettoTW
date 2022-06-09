@extends('layouts.private')

@can('isLocatore')
@section('title', 'Le tue offerte')
@endcan
@can('isLocatario')
@section('title', 'Le tue opzioni')
@endcan

@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per i filtri -->      
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/offerListFunction.js") }}"></script>
@endpush


<div class="container-listoffer">
    @can('isLocatore')
    <div class="container">
        <div class="row">
            <div class="flip-card">
                <a href="{{ route('offer.insertview') }}">
                    <div class="flip-card-inner">
                        <div class="flip-card-front flex-center">
                            <p class="new_offer">Nuova Offerta</p>
                        </div>
                        <div class="flip-card-back flex-center">
                            <div class="new_image">
                                <img src="{{asset('assets\images\button-add.png')}}" width="75px" height="75px">
                            </div>
                        </div>
                    </div>      
                </a>
            </div>  
        </div>
    </div>
    @endcan

    @isset($offerList)
    @foreach ($offerList as $offer)
    <div class="element-list">
        <div class="container">
            <div class="row">
                <div class ="col-md-3">
                    @include('helpers/offerImg', ['attrs' => 'img-list', 'imgFile' => $offer->immagine])
                </div>
                <div class ="col-md-6">
                    <ul class="titolo-indirizzo">
                        <li>{{ $offer->titolo }}</li>
                        <li>{{ $offer->citta }}, {{ $offer->via }} {{ $offer->civico }}</li>
                    </ul>
                </div>
                <div class ="col-md-3">
                    <div class="offerlist-buttons">
                        <ul>
                            @can('isLocatario')

                            @isset($optionList)
                            @foreach($optionList as $option)

                            @if($option->data_assegnamento != null && $option->locatario_id == Auth::id() && $offer->offerta_id == $option->offerta_id)
                            <li class="buttonid">
                                <p class="laipresa" >
                                    Ti è stata aggiudicata 
                                </p>                            
                            </li>  
                            @break
                            @endif

                            @if($option->data_assegnamento != null && $option->locatario_id != Auth::id() && $offer->offerta_id == $option->offerta_id)
                            <li>
                                <p class="statapresa" >
                                    &Egrave; stata aggiudicata
                                </p>
                            </li>
                            <li class="buttonid" >
                                <a class="confirmation" href="{{ route('optionedview.delete', [$offer->offerta_id]) }}">&ensp;Rimuovi &ensp; </a>
                            </li>
                            @break
                            @endif

                            @if($option->data_assegnamento == null && $option->locatario_id == Auth::id())
                            <li class="buttonid" >
                                <a class="confirmation" href="{{ route('optionedview.delete', [$offer->offerta_id]) }}">&ensp;Rimuovi &ensp; </a>
                            </li>                                 
                            @break
                            @endif

                            @endforeach
                            @endisset

                            @endcan

                            @can('isLocatore')
                            <li><a  class ="proposte">Proposte</a></li>
                            <li  class="buttonid" ><a href="{{ route('offer.updateview', [$offer->offerta_id]) }}">Modifica</a></li>
                            <li class="buttonid confirmation" ><a href="{{ route('offerview.delete', [$offer->offerta_id]) }}">Elimina</a></li>
                            @endcan
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="offerta container" style="display: none">
        <div class="row">
            <div class ="col-md-12">
                Descrizione:<br>
                {{ $offer->descrizione }}
            </div>
            <div class ="col-md-12">
                <table>
                    <tr>
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
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    @endisset
                    <tr>
                        <td>Climatizzazione</td>
                        @if($offer->climatizzazione)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    <tr>
                        <td>Connessione a Internet</td>
                        @if($offer->connessione_internet)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    @isset($offer->cucina)
                    <tr>
                        <td>Cucina</td>
                        @if($offer->cucina)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    <tr>
                        @endisset
                        @isset($offer->locale_ricreativo)
                        <td>Locale ricreativo</td>
                        @if($offer->locale_ricreativo)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    @endisset
                    <tr>
                        <td>Parcheggi</td>
                        @if($offer->parcheggi)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    <tr>
                        <td>Farmacia</td>
                        @if($offer->farmacia)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    <tr>
                        <td>Supermercato</td>
                        @if($offer->supermercato)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    <tr>
                        <td>Ristorazione</td>
                        @if($offer->ristorazione)
                        <td>
                            si                       
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                    <tr>
                        <td>Trasporti pubblici</td>
                        @if($offer->trasporti)
                        <td>
                            si
                        </td>  
                        @else
                        <td>no</td> 
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>

    @can('isLocatore')
    <div class="prop container" style="display: none">
        <div class="row" id="proposta">

            @isset($optionList)
            @foreach($optionList as $option)

            @if($offer->offerta_id == $option->offerta_id)
            @foreach($idLarioList as $lario)
            @if($option->locatario_id == $lario->id)

            <div class="col-md-8 center_lario">
                <p class="data_lario">{{ $lario->surname }} {{ $lario->name }}, {{ $lario->genere }}, @if($lario->genere == 'Uomo') nato @else nata @endif  il: {{ date('d-m-Y',strtotime($lario->data_nascita)) }}  </p>
            </div>

            @if($option->data_assegnamento == null)

            <div class="col-md-4 center_lario" >              
                <div class="offerlist-buttons">
                    <ul>
                        <li><a  id="accetta" class="confirmation" href="{{ route('offerview.accept', [$option->opzionamento_id]) }}" >&ensp;Accetta&ensp;</a></li>
                    </ul>
                </div>              
            </div>

            @else 
            <div class="col-md-4 center_lario" id="accettata">
                <div class="offerlist-buttons"> 
                    <ul>
                        <li class="aggiudicata">
                            <a style="background-color: #29a329" target="_blank" href="{{ route('contract', [$option->opzionamento_id])}}">Contratto</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif

            @endif
            @endforeach
            @endif

            @endforeach
            @endisset


        </div>
    </div>
    @endcan

    @endforeach
    @endisset
</div>


@endsection
