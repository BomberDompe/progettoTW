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
                        <img src="http://localhost/laraProj5/public/images/products/gigachad.jpg" class="imagefrm">
                     </div>
                    <div class="infopro">
                        <h2 class="titlepro"> {{ $offer->titolo }} </h2>
                        <div class="adress">
                            <p>{{ $offer->citta}}, {{ $offer->via }} {{ $offer->civico }}</p>
                        </div>
                        <div class="propapp">
                            <div class="casel">
                                IO
                            </div>
                            <div class="casel">
                                SONO
                            </div>
                            <div class="casel">
                                AGENDA
                            </div>
                            
                        </div>
                        <p class="metapro"> {{ $offer->descrizione }} </p>
                    </div>
                    <div class="pricebox">
                        <div class="price">
                            {{ $offer->prezzo }}
                            
                        </div>
                        <div class="functional-buttons">
                            <ul>
                                <li><a>Dettagli</a></li>
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


