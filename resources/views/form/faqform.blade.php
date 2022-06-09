@extends('layouts.private')

@isset($faq)
    @section('title', 'Modifica F.A.Q')
@else
    @section('title', 'Aggiungi F.A.Q')
@endisset

@section('content')

<div class="container">
    <div class="inner-container">
        @isset($faq)
            <h3>Modifica F.A.Q.</h3>
            <p>Utilizza questa form per modificare la F.A.Q selezionata</p>
        @else
            <h3>Aggiungi F.A.Q.</h3>
            <p>Utilizza questa form per inserire una nuova domanda e risposta nel F.A.Q</p>
        @endisset


        <div class="">
            @isset($faq)
                {{ Form::open(array('route' => 'faq.update', 'id' => 'insertfaq', 'class' => 'insertform')) }}
            @else
                {{ Form::open(array('route' => 'faq.insert', 'id' => 'insertfaq', 'class' => 'insertform')) }}
            @endisset
            <fieldset class="insertform-fieldset col-md-12">
                <legend>
                    @isset($faq)
                        <h5>&nbspModifica F.A.Q.&nbsp</h5>
                    @else
                        <h5>&nbspNuova F.A.Q.&nbsp</h5>
                    @endisset
                    
                </legend>
                <div  class="col-md-12">
                    <div  class="insertform-wrap">
                        {{ Form::label('domanda', 'Domanda', ['class' => 'insertform-label']) }}
                        @isset($faq)
                            {{ Form::textarea('domanda', "$faq->domanda", ['class' => 'insertform-textarea-input', 'id' => 'domanda', 'rows' => 2]) }}
                        @else
                            {{ Form::textarea('domanda', '', ['class' => 'insertform-textarea-input', 'id' => 'domanda', 'rows' => 2]) }}
                        @endisset
                        
                        @if ($errors->first('domanda'))
                        <ul class="errors">
                            @foreach ($errors->get('domanda') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div  class="col-md-12">
                    <div  class="insertform-wrap">
                        {{ Form::label('risposta', 'Risposta', ['class' => 'insertform-label']) }}
                        @isset($faq)
                            {{ Form::textarea('risposta', "$faq->risposta", ['class' => 'insertform-textarea-input', 'id' => 'risposta', 'rows' => 3]) }}
                        @else
                            {{ Form::textarea('risposta', '', ['class' => 'insertform-textarea-input', 'id' => 'risposta', 'rows' => 3]) }}
                        @endisset
                        
                        @if ($errors->first('risposta'))
                        <ul class="errors">
                            @foreach ($errors->get('risposta') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </fieldset>
            <div class="flex-center">
                {{ Form::reset('Reset', ['class' => 'functional-buttons-normal', 'id' => 'resetButton']) }} 
                @isset($faq)
                    {{ Form::submit('Salva', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
                @else
                    {{ Form::submit('Aggiungi', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
                @endisset
                
            </div>
            
            @isset($faq)
            <input type="hidden" id="faq_id" name="faq_id" value=" {{ $faq->faq_id }}">
            @endisset

            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection




