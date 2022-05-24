@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

<!-- inizio sezione prodotti -->
@section('content')

<div class="container">
  @isset($catalog)
    @foreach ($catalog as $offer)
    <div class="prod">
                <div class="oneitem">
                    <div class="imagepro">
                        @include('helpers/offerImg', ['attrs' => 'imagefrm', 'imgFile' => $offer->immagine])
                     </div>
                    <div class="infopro">
                        <h2 class="titlepro"> {{ $offer->titolo }} </h2>
                        <div class="adress">
                            {{ $offer->citta}}, {{ $offer->via }} {{ $offer->civico }}
                        </div>
                        <p class="metapro"> {{ $offer->descrizione }} </p>
                    </div>
                    <div class="pricebox">
                        <div class="price">
                            {{ number_format($offer->prezzo, 2, ',', '.') }} €
                            
                        </div>
                        <div class="functional-buttons">
                            <ul>
                                <li><a href="{{ route('details') }}">Dettagli</a></li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
            </div>
    @endforeach
  
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $catalog])
    
  @endisset()
        </div>

@endsection


