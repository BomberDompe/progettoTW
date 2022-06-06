@extends('layouts.private')

@section('title', 'Nuova Offerta')

@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per la gestione dei campi -->      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/filtersCatalog.js") }}"></script>
@endpush

<div class="container">
    <div class="inner-container">
        <h3>Aggiungi Offerte</h3>
        <p>Utilizza questa form per inserire una nuova offerta nel Catalogo</p>
        
        <div class="">
            {{ Form::open(array('route' => 'offer.insert', 'id' => 'insertoffer', 'files' => true, 'class' => 'insertform')) }}
            <fieldset class="insertform-fieldset col-md-12">
                <legend>
                    <h5>&nbspGenerali&nbsp</h5>
                </legend>
                <div  class="col-md-12">
                    <div  class="insertform-wrap">
                        {{ Form::label('titolo', 'Titolo', ['class' => 'insertform-label']) }}
                        {{ Form::textarea('titolo', '', ['class' => 'insertform-textarea-input', 'id' => 'titolo', 'rows' => 1]) }}
                        @if ($errors->first('titolo'))
                        <ul class="errors">
                            @foreach ($errors->get('titolo') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div  class="col-md-12">
                    <div  class="insertform-wrap">
                        {{ Form::label('descrizione', 'Descrizione', ['class' => 'insertform-label']) }}
                        {{ Form::textarea('descrizione', '', ['class' => 'insertform-textarea-input', 'id' => 'descrizione', 'rows' => 3]) }}
                        @if ($errors->first('descrizione'))
                        <ul class="errors">
                            @foreach ($errors->get('descrizione') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </fieldset>
            <fieldset class="insertform-fieldset-hidden col-md-12">
                <div  class="insertform-wrap-4">
                    {{ Form::label('prezzo', 'Prezzo (€):', ['class' => 'insertform-label']) }}
                    {{ Form::text('prezzo', '', ['class' => 'insertform-numeric-input', 'id' => 'prezzo']) }}
                    @if ($errors->first('prezzo'))
                    <ul class="errors">
                        @foreach ($errors->get('prezzo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>   
                <div  class="insertform-wrap-8">
                    {{ Form::label('immagine', 'Immagine:', ['class' => 'insertform-label']) }}
                    {{ Form::file('immagine', ['class' => 'insertform-file-input', 'id' => 'immagine']) }}
                    @if ($errors->first('immagine'))
                    <ul class="errors">
                        @foreach ($errors->get('immagine') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </fieldset>
            <fieldset class="insertform-fieldset col-md-12">
                <legend>
                    <h5>&nbspIndirizzo&nbsp</h5>
                </legend>
                <div  class="">
                    <div  class="insertform-wrap-4">
                        {{ Form::label('citta', 'Città:', ['class' => 'insertform-label']) }}
                        {{ Form::text('citta', '', ['class' => 'insertform-text-input', 'id' => 'citta']) }}
                        @if ($errors->first('citta'))
                        <ul class="errors">
                            @foreach ($errors->get('citta') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div  class="insertform-wrap-4">
                        {{ Form::label('via', 'Via:', ['class' => 'insertform-label']) }}
                        {{ Form::text('via', '', ['class' => 'insertform-text-input', 'id' => 'via']) }}
                        @if ($errors->first('via'))
                        <ul class="errors">
                            @foreach ($errors->get('via') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div  class="insertform-wrap-4">
                        {{ Form::label('civico', 'N. Civico:', ['class' => 'insertform-label']) }}
                        {{ Form::text('civico', '', ['class' => 'insertform-numeric-input','id' => 'civico']) }}
                        @if ($errors->first('via'))
                            <ul class="errors">
                            @foreach ($errors->get('via') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </fieldset>
            <fieldset class="insertform-fieldset col-md-8">
                <legend>
                    <h5>&nbspPeriodo di disponibilità&nbsp</h5>
                </legend>
                <div  class="">
                    <div  class="insertform-wrap-6">
                        {{ Form::label('disponibilita_inizio', 'Inizio:', ['class' => 'insertform-label']) }}
                        {{ Form::date('disponibilita_inizio', '', ['class' => 'insertform-date-input', 'id' => 'disponibilita_inizio']) }}
                        @if ($errors->first('disponibilita_inizio'))
                        <ul class="errors">
                            @foreach ($errors->get('disponibilita_inizio') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div  class="insertform-wrap-6">
                        {{ Form::label('disponibilita_fine', 'Fine:', ['class' => 'insertform-label']) }}
                        {{ Form::date('disponibilita_fine', '', ['class' => 'insertform-date-input', 'id' => 'disponibilita_fine']) }}
                        @if ($errors->first('disponibilita_fine'))
                        <ul class="errors">
                            @foreach ($errors->get('disponibilita_fine') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </fieldset>
            <fieldset class="insertform-fieldset col-md-12">
                <legend>
                    <h5>&nbspVincoli sul locatario&nbsp</h5>
                </legend>
                <div  class="">
                    <div  class="insertform-wrap-4">
                        {{ Form::label('genere', 'Genere:', ['class' => 'insertform-label']) }}
                        {{ Form::select('genere', ['1' => 'Uomo', '0' => 'Donna'], '1', ['class' => 'insertform-select-input','id' => 'genere']) }}
                        @if ($errors->first('genere'))
                        <ul class="errors">
                            @foreach ($errors->get('genere') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div  class="insertform-wrap-4">
                        {{ Form::label('eta_max', 'Età massima:', ['class' => 'insertform-label']) }}
                        {{ Form::text('eta_max', '', ['class' => 'insertform-numeric-input', 'id' => 'eta_max']) }}
                        @if ($errors->first('eta_max'))
                        <ul class="errors">
                            @foreach ($errors->get('eta_max') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div  class="insertform-wrap-4">
                        {{ Form::label('eta_min', 'Età minima:', ['class' => 'insertform-label']) }}
                        {{ Form::text('eta_min', '', ['class' => 'insertform-numeric-input', 'id' => 'eta_min']) }}
                        @if ($errors->first('eta_min'))
                        <ul class="errors">
                            @foreach ($errors->get('eta_min') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </fieldset>
            <fieldset class="insertform-fieldset col-md-4">
                <legend>
                    <h5>&nbspTipologia di offerta&nbsp</h5>
                </legend>
                <div class="filter-wrap-radio">
                    <div class="filter-wrap">
                    {{ Form::radio('tipologia', '0', true, ['class' => 'filter-radio-input', 'id' => 'typeApartment']) }}
                    {{ Form::label('typeApartment', 'Appartamento', ['class' => 'filter-radio-label']) }}
                    </div>
                    <div class="filter-wrap">
                    {{ Form::radio('tipologia', '1', false, ['class' => 'filter-radio-input', 'id' => 'typeBedplace']) }}
                    {{ Form::label('typeBedplace', 'Posto letto', ['class' => 'filter-radio-label']) }}
                    </div>
                </div>
            </fieldset>
            <fieldset class="insertform-fieldset col-md-12">
                <legend>
                    <h5>&nbspCaratteristiche dell'offerta e servizi disponibili&nbsp</h5>
                </legend>
                <div class="filter-wrap-checkbox">
                    <div class="filter-wrap-inline"  id="appartamento">
                    {{ Form::label('sup_appartamento', 'Sup. Appartamento (mq):', ['class' => 'filter-label']) }}
                    {{ Form::number('sup_appartamento', '', ['class' => 'filter-input', 'id' => 'sup_appartamento']) }}
                    </div>
                    <div class="filter-wrap"  id="appartamento">
                    {{ Form::checkbox('cucina', '', false, ['class' => 'filter-checkbox-input', 'id' => 'cucina']) }}
                    {{ Form::label('cucina', 'Cucina', ['class' => 'filter-checkbox-label']) }}
                    </div>
                    <div class="filter-wrap"  id="appartamento">
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
                    {{ Form::number('num_camere', '', ['class' => 'filter-input', 'id' => 'num_camere']) }}
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
            
            
            <div class="flex-center">
                {{ Form::button('Reset', ['class' => 'functional-buttons-normal', 'id' => 'resetButton']) }} 
                {{ Form::submit('Aggiungi', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection


