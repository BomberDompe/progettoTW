@extends('layouts.private')


@isset($offer)
    @section('title', 'Modifica Offerta')
@else
    @section('title', 'Nuova Offerta')
@endisset

@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per la gestione dei campi -->      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/ajaxOfferValidation.js") }}"></script>
<script> 
    $(function () {
        var actionUrl = $('.insertform').prop('action');
        var formId = $('#insertoffer').attr('id');
        $(":input").on('blur', function () {
            var formElementId = $(this).attr('id');
            if(formElementId !== 'eta_max') {
                doElemValidation(formElementId, actionUrl, formId);
            }
        });
        $("#insertoffer").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId);
        });
    });
    
    $(function () {
        $('input[type=radio][name=tipologia]').trigger('change');
    });
</script>
@endpush

<div class="container">
    <div class="inner-container">
        @isset($offer)
            <h3>Modifica Offerta</h3>
            <p>Utilizza questa form per modificare una tua offerta</p>
        @else
            <h3>Aggiungi Offerta</h3>
            <p>Utilizza questa form per inserire una nuova offerta</p>
        @endisset
        
        <div class="">
            @isset($offer)
            {{ Form::open(array('route' => 'offer.update', 'id' => 'insertoffer', 'files' => true, 'class' => 'insertform')) }}
            @else
            {{ Form::open(array('route' => 'offer.insert', 'id' => 'insertoffer', 'files' => true, 'class' => 'insertform')) }}
            @endisset
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset col-md-12">
                    <legend>
                        <h5>&nbspGenerali&nbsp</h5>
                    </legend>
                    <div  class="col-md-12">
                        <div  class="insertform-wrap">
                            {{ Form::label('titolo', 'Titolo', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::textarea('titolo', "$offer->titolo", ['class' => 'insertform-textarea-input', 'id' => 'titolo', 'rows' => 1]) }}
                            @else
                            {{ Form::textarea('titolo', '', ['class' => 'insertform-textarea-input', 'id' => 'titolo', 'rows' => 1]) }}
                            @endisset
                        </div>
                    </div>
                    <div  class="col-md-12">
                        <div  class="insertform-wrap">
                            {{ Form::label('descrizione', 'Descrizione', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::textarea('descrizione', "$offer->descrizione", ['class' => 'insertform-textarea-input', 'id' => 'descrizione', 'rows' => 3]) }}
                            @else
                            {{ Form::textarea('descrizione', '', ['class' => 'insertform-textarea-input', 'id' => 'descrizione', 'rows' => 3]) }}
                            @endisset
                            

                        </div>
                    </div>
                </fieldset>
            </div>
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset-hidden col-md-12">
                    <div  class="insertform-wrap-4">
                        {{ Form::label('prezzo', 'Prezzo (€):', ['class' => 'insertform-label']) }}
                        @isset($offer)
                        {{ Form::text('prezzo', "$offer->prezzo", ['class' => 'insertform-numeric-input', 'id' => 'prezzo']) }}
                        @else
                        {{ Form::text('prezzo', '', ['class' => 'insertform-numeric-input', 'id' => 'prezzo']) }}
                        @endisset
                    </div>   
                    <div  class="insertform-wrap-8">
                        {{ Form::label('immagine', 'Immagine:', ['class' => 'insertform-label']) }}
                        @isset($offer)
                        {{ Form::file('immagine', ['class' => 'insertform-file-input', 'id' => 'immagine']) }}
                        @else
                        {{ Form::file('immagine', ['class' => 'insertform-file-input', 'id' => 'immagine']) }}
                        @endisset
                        
                    </div>
                </fieldset>
            </div>
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset col-md-12">
                    <legend>
                        <h5>&nbspIndirizzo&nbsp</h5>
                    </legend>
                    <div  class="">
                        <div  class="insertform-wrap-4">
                            {{ Form::label('citta', 'Città:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::text('citta', "$offer->citta", ['class' => 'insertform-text-input', 'id' => 'citta']) }}
                            @else
                            {{ Form::text('citta', '', ['class' => 'insertform-text-input', 'id' => 'citta']) }}
                            @endisset
                        </div>
                        <div  class="insertform-wrap-4">
                            {{ Form::label('via', 'Via:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::text('via', "$offer->via", ['class' => 'insertform-text-input', 'id' => 'via']) }}
                            @else
                            {{ Form::text('via', '', ['class' => 'insertform-text-input', 'id' => 'via']) }}
                            @endisset
                        </div>
                        <div  class="insertform-wrap-4">
                            {{ Form::label('civico', 'N. Civico:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::text('civico', "$offer->civico", ['class' => 'insertform-numeric-input','id' => 'civico']) }}
                            @else
                            {{ Form::text('civico', '', ['class' => 'insertform-numeric-input','id' => 'civico']) }}
                            @endisset
                        </div>
                    </div>
                </fieldset>
            </div>
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset col-md-8">
                    <legend>
                        <h5>&nbspPeriodo di disponibilità&nbsp</h5>
                    </legend>
                    <div  class="">
                        <div  class="insertform-wrap-6">
                            {{ Form::label('disponibilita_inizio', 'Inizio:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::date('disponibilita_inizio', "$offer->disponibilita_inizio", ['class' => 'insertform-date-input',
                                    'id' => 'disponibilita_inizio', 'max' => '2100-01-01']) }}
                            @else
                            {{ Form::date('disponibilita_inizio', '', ['class' => 'insertform-date-input',
                                    'id' => 'disponibilita_inizio', 'max' => '2100-01-01']) }}
                            @endisset        
                        </div>
                        <div  class="insertform-wrap-6">
                            {{ Form::label('disponibilita_fine', 'Fine:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::date('disponibilita_fine', "$offer->disponibilita_fine", ['class' => 'insertform-date-input',
                                    'id' => 'disponibilita_fine', 'max' => '2100-01-01']) }}
                            @else
                            {{ Form::date('disponibilita_fine', '', ['class' => 'insertform-date-input',
                                    'id' => 'disponibilita_fine', 'max' => '2100-01-01']) }}
                            @endisset        
                        </div>
                    </div>
                </fieldset>
            </div>
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset col-md-12">
                    <legend>
                        <h5>&nbspVincoli sul locatario&nbsp</h5>
                    </legend>
                    <div  class="">
                        <div  class="insertform-wrap-4">
                            {{ Form::label('genere_locatario', 'Genere:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::select('genere_locatario', ['-1' => 'Nessun vincolo', '0' => 'Uomo', '1' => 'Donna'], "$offer->genere_locatario", ['class' => 'insertform-select-input','id' => 'genere']) }}
                            @else
                            {{ Form::select('genere_locatario', ['-1' => 'Nessun vincolo', '0' => 'Uomo', '1' => 'Donna'], '-1', ['class' => 'insertform-select-input','id' => 'genere']) }}
                            @endisset
                        </div>
                        
                        <div  class="insertform-wrap-4">
                            {{ Form::label('eta_max', 'Età massima:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::number('eta_max', "$offer->eta_max", ['class' => 'insertform-numeric-input', 'id' => 'eta_max']) }}
                            @else
                            {{ Form::number('eta_max', 25, ['class' => 'insertform-numeric-input', 'id' => 'eta_max']) }}
                            @endisset
                        </div>
                        <div  class="insertform-wrap-4">
                            {{ Form::label('eta_min', 'Età minima:', ['class' => 'insertform-label']) }}
                            @isset($offer)
                            {{ Form::number('eta_min', "$offer->eta_min", ['class' => 'insertform-numeric-input', 'id' => 'eta_min']) }}
                            @else
                            {{ Form::number('eta_min', 18, ['class' => 'insertform-numeric-input', 'id' => 'eta_min']) }}
                            @endisset
                        </div>
                        
                    </div>
                </fieldset>
            </div>
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset col-md-4">
                    <legend>
                        <h5>&nbspTipologia di offerta&nbsp</h5>
                    </legend>
                    <div class="filter-wrap-radio">
                        <div class="filter-wrap">
                            @isset($offer)
                            @if($offer->tipologia === 0)
                            {{ Form::radio('tipologia', '0', true, ['class' => 'filter-radio-input', 'id' => 'typeApartment']) }}
                            @else
                            {{ Form::radio('tipologia', '0', false, ['class' => 'filter-radio-input', 'id' => 'typeApartment']) }}
                            @endif
                            @else
                            {{ Form::radio('tipologia', '0', true, ['class' => 'filter-radio-input', 'id' => 'typeApartment']) }}
                            @endisset
                            {{ Form::label('typeApartment', 'Appartamento', ['class' => 'filter-radio-label']) }}
                        </div>
                        <div class="filter-wrap">
                            @isset($offer)
                            @if($offer->tipologia === 1)
                            {{ Form::radio('tipologia', '1', true, ['class' => 'filter-radio-input', 'id' => 'typeBedplace']) }}
                            @else
                            {{ Form::radio('tipologia', '1', false, ['class' => 'filter-radio-input', 'id' => 'typeBedplace']) }}
                            @endif
                            @else
                            {{ Form::radio('tipologia', '1', false, ['class' => 'filter-radio-input', 'id' => 'typeBedplace']) }}
                            @endisset
                            {{ Form::label('typeBedplace', 'Posto letto', ['class' => 'filter-radio-label']) }}                        
                        </div>
                    </div>
                </fieldset>
            </div>
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset col-md-12">
                    <legend>
                        <h5>&nbspCaratteristiche dell'offerta e servizi disponibili&nbsp</h5>
                    </legend>
                    <div class="filter-wrap-checkbox">
                        <div class="filter-wrap-inline"  id="appartamento">
                        {{ Form::label('sup_appartamento', 'Sup. Appartamento (mq):', ['class' => 'filter-label']) }}
                        @isset($offer)
                        {{ Form::number('sup_appartamento', "$offer->sup_appartamento", ['class' => 'filter-input', 'id' => 'sup_appartamento']) }}
                        @else
                        {{ Form::number('sup_appartamento', '', ['class' => 'filter-input', 'id' => 'sup_appartamento']) }}
                        @endisset
                        </div>
                        <div class="filter-wrap"  id="appartamento">
                        @isset($offer)
                        {{ Form::checkbox('cucina', '', "$offer->cucina", ['class' => 'filter-checkbox-input', 'id' => 'cucina']) }}
                        @else
                        {{ Form::checkbox('cucina', '', false, ['class' => 'filter-checkbox-input', 'id' => 'cucina']) }}
                        @endisset
                        {{ Form::label('cucina', 'Cucina', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap"  id="appartamento">
                        @isset($offer)    
                        {{ Form::checkbox('locale_ricreativo', '', "$offer->locale_ricreativo", ['class' => 'filter-checkbox-input', 'id' => 'locale_ricreativo']) }}
                        @else
                        {{ Form::checkbox('locale_ricreativo', '', false, ['class' => 'filter-checkbox-input', 'id' => 'locale_ricreativo']) }}
                        @endisset
                        {{ Form::label('locale_ricreativo', 'Locale Ricreativo', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline" id="postoletto">
                        {{ Form::label('sup_camera', 'Sup. Camera (mq):', ['class' => 'filter-label']) }}
                        @isset($offer)
                        {{ Form::number('sup_camera', "$offer->sup_camera", ['class' => 'filter-input', 'id' => 'sup_camera', 'disabled']) }}
                        @else
                        {{ Form::number('sup_camera', '', ['class' => 'filter-input', 'id' => 'sup_camera', 'disabled']) }}
                        @endisset
                        </div>
                        <div class="filter-wrap" id="postoletto">
                        @isset($offer)
                        {{ Form::checkbox('angolo_studio', '', "$offer->angolo_studio", ['class' => 'filter-checkbox-input', 'id' => 'angolo_studio', 'disabled']) }}
                        @else
                        {{ Form::checkbox('angolo_studio', '', false, ['class' => 'filter-checkbox-input', 'id' => 'angolo_studio', 'disabled']) }}
                        @endisset
                        {{ Form::label('angolo_studio', 'Angolo Studio', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        @isset($offer)   
                        {{ Form::checkbox('climatizzazione', '', "$offer->climatizzazione", ['class' => 'filter-checkbox-input', 'id' => 'climatizzazione']) }}
                        @else
                        {{ Form::checkbox('climatizzazione', '', false, ['class' => 'filter-checkbox-input', 'id' => 'climatizzazione']) }}
                        @endisset
                        {{ Form::label('climatizzazione', 'Climatizzatore', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline" id="appartamento">
                        {{ Form::label('num_camere', 'N. Camere:', ['class' => 'filter-label']) }}
                        @isset($offer)
                        {{ Form::number('num_camere', "$offer->num_camere", ['class' => 'filter-input', 'id' => 'num_camere']) }}
                        @else
                        {{ Form::number('num_camere', '', ['class' => 'filter-input', 'id' => 'num_camere']) }}
                        @endisset
                        </div>
                        <div class="filter-wrap">
                        @isset($offer)
                        {{ Form::checkbox('supermercato', '', "$offer->supermercato", ['class' => 'filter-checkbox-input', 'id' => 'supermercato']) }}
                        @else
                        {{ Form::checkbox('supermercato', '', false, ['class' => 'filter-checkbox-input', 'id' => 'supermercato']) }}
                        @endisset
                        {{ Form::label('supermercato', 'Supermercato', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        @isset($offer)
                        {{ Form::checkbox('ristorazione', '', "$offer->ristorazione", ['class' => 'filter-checkbox-input', 'id' => 'ristorazione']) }}
                        @else
                        {{ Form::checkbox('ristorazione', '', false, ['class' => 'filter-checkbox-input', 'id' => 'ristorazione']) }}
                        @endisset
                        {{ Form::label('ristorazione', 'Ristorante', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline">
                        {{ Form::label('posti_tot', 'N. Posti Totali:', ['class' => 'filter-label']) }}
                        @isset($offer)
                        {{ Form::number('posti_tot', "$offer->posti_tot", ['class' => 'filter-input', 'id' => 'posti_tot']) }}
                        @else
                        {{ Form::number('posti_tot', '', ['class' => 'filter-input', 'id' => 'posti_tot']) }}
                        @endisset
                        </div>
                        <div class="filter-wrap">
                        @isset($offer)
                        {{ Form::checkbox('farmacia', '', "$offer->farmacia", ['class' => 'filter-checkbox-input', 'id' => 'farmacia']) }}
                        @else
                        {{ Form::checkbox('farmacia', '', false, ['class' => 'filter-checkbox-input', 'id' => 'farmacia']) }}
                        @endisset    
                        
                        {{ Form::label('farmacia', 'Farmacia', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        @isset($offer)
                        {{ Form::checkbox('parcheggi', '', "$offer->parcheggi", ['class' => 'filter-checkbox-input', 'id' => 'parcheggi']) }}
                        @else
                        {{ Form::checkbox('parcheggi', '', false, ['class' => 'filter-checkbox-input', 'id' => 'parcheggi']) }}
                        @endisset
                        {{ Form::label('parcheggi', 'Parcheggi', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap-inline" id="postoletto">
                        {{ Form::label('posti_camera', 'N. Posti Camera:', ['class' => 'filter-label']) }}
                        @isset($offer)
                        {{ Form::number('posti_camera', "$offer->posti_camera", ['class' => 'filter-input', 'id' => 'posti_camera', 'disabled']) }}
                        </div>
                        @else
                        {{ Form::number('posti_camera', '', ['class' => 'filter-input', 'id' => 'posti_camera', 'disabled']) }}
                        </div>
                        @endisset
                        
                        <div class="filter-wrap">
                        @isset($offer)
                        {{ Form::checkbox('trasporti', '', "$offer->trasporti", ['class' => 'filter-checkbox-input', 'id' => 'trasporti']) }}
                        @else
                        {{ Form::checkbox('trasporti', '', false, ['class' => 'filter-checkbox-input', 'id' => 'trasporti']) }}
                        @endisset
                        {{ Form::label('trasporti', 'Trasporti', ['class' => 'filter-checkbox-label']) }}
                        </div>
                        <div class="filter-wrap">
                        @isset($offer)
                        {{ Form::checkbox('connessione_internet', '', "$offer->connessione_internet", ['class' => 'filter-checkbox-input', 'id' => 'connessione_internet']) }}
                        @else
                        {{ Form::checkbox('connessione_internet', '', false, ['class' => 'filter-checkbox-input', 'id' => 'connessione_internet']) }}
                        @endisset
                        {{ Form::label('connessione_internet', 'Conness. Internet', ['class' => 'filter-checkbox-label']) }}
                        </div>
                    </div>  
                </fieldset>
            </div>
            <div class="flex-center">
                @isset($offer)
                {{ Form::submit('Salva modifiche', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
                @else
                {{ Form::button('Reset', ['class' => 'functional-buttons-normal', 'id' => 'resetButton']) }} 
                {{ Form::submit('Aggiungi', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
                @endisset
            </div>
            
            @isset($offer)
            <input type="hidden" id="offerta_id" name="offerta_id" value=" {{ $offer->offerta_id }}">
            @endisset
            
            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection


