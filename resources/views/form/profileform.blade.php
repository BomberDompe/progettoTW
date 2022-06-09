@extends('layouts.private')

@section('title', 'Modifica Profilo')

@section('content')


<div class="container">
    <div class="inner-container">
        <h3>Modifica Profilo</h3>
        <p>Utilizza questa form per modificare il tuo profilo</p>
        
        <div class="">
            {{ Form::open(array('route' => 'profile.update', 'id' => 'insertoffer', 'class' => 'insertform')) }}
            <div id="fieldset-block">
                <fieldset class="insertform-fieldset col-md-12">
                    <legend>
                        <h5>&nbspModifica Profilo&nbsp</h5>
                    </legend>
                    <div  class="profileform-container">
                        <div  class="insertform-wrap-6 profileform-wrap">
                            {{ Form::label('name', 'Nome:', ['class' => 'insertform-label']) }}
                            {{ Form::text('name', "$user->name", ['class' => 'insertform-text-input', 'id' => 'name']) }}
                        </div>
                        <div  class="insertform-wrap-6 profileform-wrap">
                            {{ Form::label('surname', 'Cognome:', ['class' => 'insertform-label']) }}
                            {{ Form::text('surname', "$user->surname", ['class' => 'insertform-text-input', 'id' => 'surname']) }}
                        </div>
                    </div>
                    @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if ($errors->first('surname'))
                    <ul class="errors">
                        @foreach ($errors->get('surname') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div  class="profileform-container">
                        <div  class="insertform-wrap-6 profileform-wrap">
                            {{ Form::label('genere', 'Genere', ['class' => 'insertform-label']) }}
                            {{ Form::select('genere', ['0' => 'Uomo', '1' => 'Donna'], '$user->genere', ['class' => 'insertform-select-input','id' => 'genere']) }}
                        </div>
                        <div  class="insertform-wrap-6 profileform-wrap">
                            {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'insertform-label']) }}
                            {{ Form::date('data_nascita', "$user->data_nascita", ['class' => 'insertform-date-input',
                                    'id' => 'data_nascita', 'min' => '1950-01-01', 'max' => '2010-01-01']) }}    
                        </div>
                    </div>
                    @if ($errors->first('data_nascita'))
                    <ul class="errors">
                        @foreach ($errors->get('data_nascita') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div  class="profileform-container">
                        <div  class="insertform-wrap-6 profileform-wrap">
                            {{ Form::label('telefono', 'Telefono', ['class' => 'insertform-label']) }}
                            {{ Form::text('telefono', "$user->telefono", ['class' => 'insertform-text-input', 'id' => 'surname']) }}
                        </div>
                        <div  class="insertform-wrap-6 profileform-wrap">
                            {{ Form::label('comune_residenza', 'Comune di Residenza', ['class' => 'insertform-label']) }}
                            {{ Form::text('comune_residenza', "$user->comune_residenza", ['class' => 'insertform-text-input', 'id' => 'comune_residenza']) }}
                        </div>
                    </div>
                    @if ($errors->first('telefono'))
                    <ul class="errors">
                        @foreach ($errors->get('telefono') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if ($errors->first('comune_residenza'))
                    <ul class="errors">
                        @foreach ($errors->get('comune_residenza') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </fieldset>
            </div>
            <div class="flex-center">
                {{ Form::submit('Salva modifiche', ['class' => 'functional-buttons-normal', 'id' => 'submitButton']) }} 
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection


