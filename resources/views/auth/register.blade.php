@extends('layouts.public')

@section('title', 'Regolamento')

@section('content')
<div class="bg_image">
    <div class="screen__register">
        <div class="screen__content">

            <div class="container height-100">

                <div class="row height-100">
                    {{ Form::open(array('route' => 'register', 'class' => 'register')) }}
                    <div class="col-md-12">
                        <h3 class="flex-center">Registrazione</h3>
                    </div>
                    <div class="register-wrapper">
                        <div class="col-md-4 register__center">
                            <div  class="register__field">
                                <div class="calendario">
                                    {{ Form::label('data_nascita', 'Data di nascita', ['class' => '']) }}
                                    {{ Form::date('data_nascita','', ['class' => 'register__input',
                                            'id' => 'data_nascita', 'min' => '1950-01-01', 'max' => '2010-01-01']) }}
                                </div>
                            </div>
                            <div class="register__fieldset">
                                <fieldset class="register-fieldset">
                                    <legend>
                                        &nbspGenere&nbsp
                                    </legend>
                                    <div  class="filter-wrap-radio">
                                        <div class="filter-wrap">
                                            {{ Form::radio('genere', 'Uomo', true, ['class' => 'filter-radio-input', 'id' => 'maschio']) }}
                                            {{ Form::label('maschio', 'Uomo', ['class' => 'filter-radio-label']) }}
                                        </div>
                                        <div class="filter-wrap">
                                            {{ Form::radio('genere', 'Donna', false, ['class' => 'filter-radio-input', 'id' => 'femmina']) }}
                                            {{ Form::label('femmina', 'Donna', ['class' => 'filter-radio-label']) }}
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="register__fieldset">
                                <fieldset class="register-fieldset">
                                    <legend>
                                        &nbspTipo di account&nbsp
                                    </legend>
                                    <div  class="filter-wrap-radio">
                                        <div class="filter-wrap">
                                            {{ Form::radio('role', 'locatario', true, ['class' => 'filter-radio-input', 'id' => 'locatario']) }}
                                            {{ Form::label('locatario', 'Locatario', ['class' => 'filter-radio-label']) }}
                                        </div>
                                        <div class="filter-wrap">
                                            {{ Form::radio('role', 'locatore', false, ['class' => 'filter-radio-input', 'id' => 'locatore']) }}
                                            {{ Form::label('locatore', 'Locatore', ['class' => 'filter-radio-label']) }}
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            
                            

                            
                        </div>
                        <div class="col-md-4 register__center">

                            <div  class="register__field">
                                {{ Form::label('username', 'Username', ['class' => '']) }}
                                {{ Form::text('username', '', ['class' => 'register__input','id' => 'username']) }}
                                @if ($errors->first('username'))
                                <ul class="errors">
                                    @foreach ($errors->get('username') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div  class="register__field">
                                {{ Form::label('password', 'Password', ['class' => '']) }}
                                {{ Form::password('password', ['class' => 'register__input', 'id' => 'password']) }}
                                @if ($errors->first('password'))
                                <ul class="errors">
                                    @foreach ($errors->get('password') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div  class="register__field">
                                {{ Form::label('password-confirm', 'Conferma password', ['class' => '']) }}
                                {{ Form::password('password_confirmation', ['class' => 'register__input', 'id' => 'password-confirm']) }}
                            </div>
                             <div  class="register__field">
                                {{ Form::label('name', 'Nome', ['class' => '']) }}
                                {{ Form::text('name', '', ['class' => 'register__input', 'id' => 'name']) }}
                                @if ($errors->first('name'))
                                <ul class="errors">
                                    @foreach ($errors->get('name') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div  class="register__field">
                                {{ Form::label('surname', 'Cognome', ['class' => '']) }}
                                {{ Form::text('surname', '', ['class' => 'register__input', 'id' => 'surname']) }}
                                @if ($errors->first('surname'))
                                <ul class="errors">
                                    @foreach ($errors->get('surname') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4 register__center">

                            <div  class="register__field">
                                {{ Form::label('comune_residenza', 'Comune di residenza', ['class' => '']) }}
                                {{ Form::text('comune_residenza', '', ['class' => 'register__input', 'id' => 'comune_residenza']) }}
                                @if ($errors->first('comune_residenza'))
                                <ul class="errors">
                                    @foreach ($errors->get('comune_residenza') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                            <div  class="register__field">
                                {{ Form::label('telefono', 'Numero di telefono', ['class' => '']) }}
                                {{ Form::text('telefono', '', ['class' => 'register__input', 'id' => 'telefono']) }}
                                @if ($errors->first('telefono'))
                                <ul class="errors">
                                    @foreach ($errors->get('telefono') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="container-form-btn flex-center">                
                            {{ Form::submit('Registrati', ['class' => 'register__submit']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape1"></span>
            <span class="screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
        </div>
    </div>
</div>
@endsection