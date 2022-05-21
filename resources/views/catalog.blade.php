@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

<!-- inizio sezione prodotti -->
@section('content')

<div class="container">
    @foreach ($products as $product)
    <div class="prod">
        <div class="prod-bgtop">
            <div class="prod-bgbtm">
                <div class="oneitem">
                    <div class="image">
                        @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                    </div>
                    <div class="info">
                        <h1 class="title">Prodotto: {{ $product->name }}</h1>
                        <p class="meta">Descrizione Breve: {{ $product->descShort }}</p>
                    </div>
                    <div class="pricebox">
                        @include('helpers/productPrice')
                    </div>
                </div>
                <div class="entry">
                    <p>Descrizione Estesa: {!! $product->descLong !!}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $products])

  
</div>

@endsection


