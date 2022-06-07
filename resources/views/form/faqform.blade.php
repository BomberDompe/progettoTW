@extends('layouts.private')

@section('title', 'Nuova Offerta')

@section('content')

<div class="container">
    <div class="inner-container">
        <h3>Aggiungi F.A.Q.</h3>
        <p>Utilizza questa form per inserire una nuova domanda e risposta nel F.A.Q</p>

        <div class="">
            {{ Form::open(array('route' => 'faq.insert', 'id' => 'insertfaq', 'files' => true, 'class' => 'insertform')) }}
            <fieldset class="insertform-fieldset col-md-12">
                <legend>
                    <h5>&nbspnuova F.A.Q.&nbsp</h5>
                </legend>
                <div  class="col-md-12">
                    <div  class="insertform-wrap">
                        {{ Form::label('domanda', 'Domanda', ['class' => 'insertform-label']) }}
                        {{ Form::textarea('domanda', '', ['class' => 'insertform-textarea-input', 'id' => 'domanda', 'rows' => 2]) }}
                        @if ($errors->first('descrizione'))
                        <ul class="errors">
                            @foreach ($errors->get('descrizione') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div  class="col-md-12">
                    <div  class="insertform-wrap">
                        {{ Form::label('risposta', 'Risposta', ['class' => 'insertform-label']) }}
                        {{ Form::textarea('risposta', '', ['class' => 'insertform-textarea-input', 'id' => 'risposta', 'rows' => 3]) }}
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
            <div class="flex-center">
                {{ Form::button('Reset', ['class' => 'functional-buttons-normal', 'id' => 'resetButton']) }} 
                {{ Form::submit('Aggiungi', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
            </div>

            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection




