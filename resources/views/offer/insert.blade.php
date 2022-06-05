@extends('layouts.private')

@section('title', 'Nuova Offerta')

@section('content')
<div class="container">
    <h3>Aggiungi Offerte</h3>
    <p>Utilizza questa form per inserire una nuova offerta nel Catalogo</p>

    <div class="">
        <div class="">
            
            
            
            
            
            
            
            {{ Form::open(array('route' => 'offer.insert', 'id' => 'addoffer', 'files' => true, 'class' => '')) }}
            <div  class="">
                {{ Form::label('name', 'Nome Prodotto', ['class' => '']) }}
                {{ Form::text('name', '', ['class' => '', 'id' => 'name']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="">
                {{ Form::label('catId', 'Categoria', ['class' => '']) }}
                {{ Form::select('catId', ['1' => 'Appartamento', '0' => 'Posto Letto'], '', ['class' => '','id' => 'catId']) }}
            </div>

            <div  class="">
                {{ Form::label('image', 'Immagine', ['class' => '']) }}
                {{ Form::file('image', ['class' => '', 'id' => 'image']) }}
                @if ($errors->first('image'))
                <ul class="errors">
                    @foreach ($errors->get('image') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="">
                {{ Form::label('descShort', 'Descrizione Breve', ['class' => '']) }}
                {{ Form::text('descShort', '', ['class' => '', 'id' => 'descShort']) }}
                @if ($errors->first('descShort'))
                <ul class="errors">
                    @foreach ($errors->get('descShort') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="">
                {{ Form::label('price', 'Prezzo', ['class' => '']) }}
                {{ Form::text('price', '', ['class' => '', 'id' => 'price']) }}
                @if ($errors->first('price'))
                <ul class="errors">
                    @foreach ($errors->get('price') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="">
                {{ Form::label('discountPerc', 'Sconto (%)', ['class' => '']) }}
                {{ Form::text('discountPerc', '', ['class' => '', 'id' => 'discountPerc']) }}
                @if ($errors->first('discountPerc'))
                <ul class="errors">
                    @foreach ($errors->get('discountPerc') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="">
                {{ Form::label('discounted', 'In Sconto', ['class' => '']) }}
                {{ Form::select('discounted', ['1' => 'Si', '0' => 'No'], 1, ['class' => '','id' => 'discounted']) }}
            </div>

            <div  class="">
                {{ Form::label('descLong', 'Descrizione Estesa', ['class' => '']) }}
                {{ Form::textarea('descLong', '', ['class' => '', 'id' => 'descLong', 'rows' => 2]) }}
                @if ($errors->first('descLong'))
                <ul class="errors">
                    @foreach ($errors->get('descLong') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="">                
                {{ Form::submit('Aggiungi Prodotto', ['class' => '']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection


