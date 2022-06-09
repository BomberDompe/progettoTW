@extends('layouts.private')

@section('title', 'Statistiche')

@section('content')
<div class="container">
    <div class="inner-container">
        <h3>Statistiche</h3>
        <p>Filtra le statistiche in base al periodo e alla tipologia di offerta</p>
        
        <div class="">
            {{ Form::open(array('route' => 'stats', 'id' => 'insertoffer', 'class' => 'insertform')) }}
            <div style="display: flex">
                <div class="col-md-4" id="fieldset-block">
                    <fieldset class="insertform-fieldset">
                        <legend>
                            <h5>&nbspTipologia di offerta&nbsp</h5>
                        </legend>
                        <div class="filter-wrap-radio">
                            <div class="filter-wrap">
                                {{ Form::radio('tipologia', '-1', true, ['class' => 'filter-radio-input', 'id' => 'typeAll']) }}
                                {{ Form::label('typeAll', 'Tutte', ['class' => 'filter-radio-label']) }}
                            </div>
                            <div class="filter-wrap">
                                {{ Form::radio('tipologia', '0', false, ['class' => 'filter-radio-input', 'id' => 'typeApartment']) }}
                                {{ Form::label('typeApartment', 'Appartamento', ['class' => 'filter-radio-label']) }}
                            </div>
                            <div class="filter-wrap">
                                {{ Form::radio('tipologia', '1', false, ['class' => 'filter-radio-input', 'id' => 'typeBedplace']) }}
                                {{ Form::label('typeBedplace', 'Posto letto', ['class' => 'filter-radio-label']) }}                        
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-8" id="fieldset-block">
                    <fieldset class="insertform-fieldset">
                        <legend>
                            <h5>&nbspPeriodo&nbsp</h5>
                        </legend>
                        <div  class="">
                            <div  class="insertform-wrap-6">
                                {{ Form::label('inizio', 'Inizio:', ['class' => 'insertform-label']) }}
                                {{ Form::date('inizio', '', ['class' => 'insertform-date-input',
                                        'id' => 'inizio', 'min' => '2022-01-01', 'max' => '2100-01-01']) }}
                                @if ($errors->first('inizio'))
                                    <ul class="errors">
                                        @foreach ($errors->get('inizio') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div  class="insertform-wrap-6">
                                {{ Form::label('fine', 'Fine:', ['class' => 'insertform-label']) }}
                                {{ Form::date('fine', '', ['class' => 'insertform-date-input',
                                        'id' => 'fine', 'min' => '2022-01-01', 'max' => '2100-01-01']) }}
                                @if ($errors->first('fine'))
                                    <ul class="errors">
                                        @foreach ($errors->get('fine') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <div class="flex-center">
                        {{ Form::reset('Reset', ['class' => 'functional-buttons-normal', 'id' => 'resetButton']) }} 
                        {{ Form::submit('Filtra', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
                    </div>
                </div>
            </div>
            {{ Form::close() }}
            
            @isset($stats)
                <div class="">
                    <h5>Offerte inserite nel sito: {{ $stats["offers"] }}</h5>
                    <h5>Offerte opzionate dai Locatari: {{ $stats["optionedOffers"] }}</h5>
                    <h5>Contratti stipulati \ alloggi locati: {{ $stats["assignedOffers"] }}</h5>
                </div>
            @else
                <div class="">
                    <h5>Offerte inserite nel sito:</h5>
                    <h5>Offerte opzionate dai Locatari:</h5>
                    <h5>Contratti stipulati \ alloggi locati:</h5>
                </div>
            @endisset
        </div>
    </div>
</div>
@endsection