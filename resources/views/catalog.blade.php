@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

<!-- inizio sezione offerte -->
@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per i filtri -->      
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/filtersCatalog.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/filtersValidation.js") }}"></script>
@endpush

@if(!$errors->isEmpty())
<!-- Apre la sezione filtri se ci sono errori -->
<script>
    $(document).ready(function() { $('#filter-navbar').trigger('click'); });
</script>
@endif

<div id="filter-adapter" class="filter-adapter-hide filter-hide"></div>
<div class="filters-section" id="fix-on-scroll">
    <div id="filter-navbar">
        <div class="container">
            <div class="filter-section-title">
                <h4 id="filter-title"> SEZIONE FILTRI </h4>
            </div>
            <div class="filter-section-icon">
                <div class="icon nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="target" style="display: none">
        {{ Form::open(array('route' => 'catalog.filtered', 'id' => 'filterform', 'files' => false, 'class' => 'filter-form')) }}
        <div class="row">
          <div class="col-md-6">
            <div class="filter-fieldset">
                <fieldset>
                    <legend>
                        Fascia di prezzo
                    </legend>
                        <div class="filter-wrap">
                            {{ Form::label('min_price', 'Min:', ['class' => 'filter-label']) }}
                            {{ Form::number('min_price', 0, ['class' => 'filter-input', 'id' => 'min_price']) }}
                            <span class="filter-postinput">€</span>
                        </div>
                        <div class="filter-wrap"> 
                            {{ Form::label('max_price', 'Max:', ['class' => 'filter-label']) }}
                            {{ Form::number('max_price', 1000, ['class' => 'filter-input', 'id' => 'max_price']) }}
                            <span class="filter-postinput">€</span>
                        </div>
                </fieldset>
                @if ($errors->first('min_price'))
                <ul class="errors">
                    @foreach ($errors->get('min_price') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('max_price'))
                <ul class="errors">
                    @foreach ($errors->get('max_price') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="filter-fieldset">
                <fieldset>
                    <legend>
                        Periodo di disponibilità
                    </legend>
                        <div class="filter-wrap">
                            {{ Form::label('start_date', 'Inizio:', ['class' => 'filter-label']) }}
                            {{ Form::date('start_date', '', ['class' => 'filter-input', 'id' => 'start_date']) }}
                        </div>
                        <div class="filter-wrap"> 
                            {{ Form::label('end_date', 'Fine:', ['class' => 'filter-label']) }}
                            {{ Form::date('end_date', '', ['class' => 'filter-input', 'id' => 'end_date']) }}
                        </div>
                </fieldset>
                @if ($errors->first('start_date'))
                <ul class="errors">
                    @foreach ($errors->get('start_date') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('end_date'))
                <ul class="errors">
                    @foreach ($errors->get('end_date') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
          </div>
          <div class="col-md-4">
            <div class="filter-fieldset">
                <fieldset>
                    <legend>
                        Tipologia di offerta
                    </legend>
                    <div class="filter-wrap-radio">
                        <div class="filter-wrap">
                        {{ Form::radio('type', '-1', true, ['class' => 'filter-radio-input', 'id' => 'typeAll']) }}
                        {{ Form::label('typeAll', 'Tutte le tipologie', ['class' => 'filter-radio-label']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::radio('type', '0', false, ['class' => 'filter-radio-input', 'id' => 'typeApartment']) }}
                        {{ Form::label('typeApartment', 'Appartamento', ['class' => 'filter-radio-label']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::radio('type', '1', false, ['class' => 'filter-radio-input', 'id' => 'typeBedplace']) }}
                        {{ Form::label('typeBedplace', 'Posto letto', ['class' => 'filter-radio-label']) }}
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="flex-center-filter-button">
                {{ Form::button('Reset', ['class' => 'functional-buttons-dark', 'id' => 'resetButton']) }} 
                {{ Form::submit('Cerca', ['class' => 'functional-buttons-dark', 'id' => 'submitButton']) }} 
            </div>
          </div>
            
          <div class="col-md-8">
            <div class="filter-fieldset">
                <fieldset>
                    <legend>
                        Caratteristiche dell'offerta e servizi disponibili
                    </legend>
                    <div class="filter-wrap-checkbox">
                        <div class="filter-wrap-inline"  id="appartamento">
                        {{ Form::label('sup_appartamento', 'Sup. Appartamento (mq):', ['class' => 'filter-label']) }}
                        {{ Form::number('sup_appartamento', '', ['class' => 'filter-input', 'id' => 'sup_appartamento', 'disabled']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('cucina', '', false, ['class' => 'filter-checkbox-input', 'id' => 'cucina']) }}
                        {{ Form::label('cucina', 'Cucina', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('locale_ricreativo', '', false, ['class' => 'filter-checkbox-input', 'id' => 'locale_ricreativo']) }}
                        {{ Form::label('locale_ricreativo', 'Locale Ricreativo', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline" id="postoletto">
                        {{ Form::label('sup_camera', 'Sup. Camera (mq):', ['class' => 'filter-label']) }}
                        {{ Form::number('sup_camera', '', ['class' => 'filter-input', 'id' => 'sup_camera', 'disabled']) }}
                        </div>
                        <div class="filter-wrap" id="postoletto">
                        {{ Form::checkbox('angolo_studio', '', false, ['class' => 'filter-checkbox-input', 'id' => 'angolo_studio', 'disabled']) }}
                        {{ Form::label('angolo_studio', 'Angolo Studio', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('climatizzazione', '', false, ['class' => 'filter-checkbox-input', 'id' => 'climatizzazione']) }}
                        {{ Form::label('climatizzazione', 'Climatizzatore', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline" id="appartamento">
                        {{ Form::label('num_camere', 'N. Camere:', ['class' => 'filter-label']) }}
                        {{ Form::number('num_camere', '', ['class' => 'filter-input', 'id' => 'num_camere', 'disabled']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('supermercato', '', false, ['class' => 'filter-checkbox-input', 'id' => 'supermercato']) }}
                        {{ Form::label('supermercato', 'Supermercato', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('ristorazione', '', false, ['class' => 'filter-checkbox-input', 'id' => 'ristorazione']) }}
                        {{ Form::label('ristorazione', 'Ristorante', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline">
                        {{ Form::label('posti_tot', 'N. Posti Totali:', ['class' => 'filter-label']) }}
                        {{ Form::number('posti_tot', '', ['class' => 'filter-input', 'id' => 'posti_tot']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('farmacia', '', false, ['class' => 'filter-checkbox-input', 'id' => 'farmacia']) }}
                        {{ Form::label('farmacia', 'Farmacia', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('parcheggi', '', false, ['class' => 'filter-checkbox-input', 'id' => 'parcheggi']) }}
                        {{ Form::label('parcheggi', 'Parcheggi', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline" id="postoletto">
                        {{ Form::label('posti_camera', 'N. Posti Camera:', ['class' => 'filter-label']) }}
                        {{ Form::number('posti_camera', '', ['class' => 'filter-input', 'id' => 'posti_camera', 'disabled']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('trasporti', '', false, ['class' => 'filter-checkbox-input', 'id' => 'trasporti']) }}
                        {{ Form::label('trasporti', 'Trasporti', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        {{ Form::checkbox('opzionabilita', '', false, ['class' => 'filter-checkbox-input', 'id' => 'opzionabilita']) }}
                        {{ Form::label('opzionabilita', 'Opzionabile', ['class' => 'filter-checkbox-label']) }}
                        </div>
                    </div>  
                </fieldset>
                @if ($errors->first('sup_appartamento'))
                <ul class="errors">
                    @foreach ($errors->get('sup_appartamento') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('sup_camera'))
                <ul class="errors">
                    @foreach ($errors->get('sup_camera') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('num_camere'))
                <ul class="errors">
                    @foreach ($errors->get('num_camere') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('posti_tot'))
                <ul class="errors">
                    @foreach ($errors->get('posti_tot') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @if ($errors->first('posti_camera'))
                <ul class="errors">
                    @foreach ($errors->get('posti_camera') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
          </div>
        </div>
        {{ Form::close() }}
    
    </div>
  @can('isLocatario')
  
  @endcan
</div>
<div class="container">
  @isset($catalog)
    @foreach ($catalog as $offer)
    <div class="prod">
                <div class="oneitem">
                    <div class="imagepro">
                        @include('helpers/offerImg', ['attrs' => 'imagefrm', 'imgFile' => $offer->immagine])
                     </div>
                    <div class="infopro">
                        <h3 class="titlepro"> {{ $offer->titolo }} </h3>
                        <div class="adress">
                            {{ $offer->citta }}, {{ $offer->via }} {{ $offer->civico }}
                        </div>
                        <p class="metapro line-clamp" > {{ $offer->descrizione }} </p>
                    </div>
                    <div class="pricebox">
                        <div class="price">
                            {{ number_format($offer->prezzo, 2, ',', '.') }} €
                        </div>
                        <div class="functional-buttons">
                            <ul>
                                <li><a href="{{ route('details', [$offer->offerta_id]) }}">Dettagli</a></li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
            </div>
    @endforeach
  
    @if($pagination)
        <!--Paginazione-->
        @include('pagination.paginator', ['paginator' => $catalog])
    @endif
    
  @endisset
        </div>

@endsection


