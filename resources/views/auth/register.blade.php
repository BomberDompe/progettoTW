@extends('layouts.public')

@section('title', 'Regolamento')

@section('content')
<div class="bg_image">
    <div class="screen">
        <div class="screen__content">

            <div class="container">

                <div class="row">
                    {{ Form::open(array('route' => 'register', 'class' => 'register')) }}
                    <div class="col-md-12">
                        <h3 style="padding-left: 30%;">Registrazione</h3>
                    </div>
                    <div class="col-md-4">
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

                    </div>
                    <div class="col-md-4">
                        <div  class="register__field">

                            {{ Form::label('maschio', 'M', ['class' => '']) }}
                            {{ Form::radio('genere', '', ['class' => '', 'id' => 'maschio']) }}

                            {{ Form::label('femmina', 'F', ['class' => '']) }}
                            {{ Form::radio('genere', '', false, ['class' => '', 'id' => 'femmina']) }}


                        </div>
                        <div  class="register__field">
                            <div class="calendario">
                                {{ Form::label('data_nascita', 'Data di nascita', ['class' => '']) }}
                                {{ Form::date('data_nascita','', ['class' => '', 'id' => 'data_nascita','min' => '2000-01-01']) }}
                            </div>
                        </div>

                        <div  class="register__field">
                            {{ Form::label('comune_residenza', 'Comune di nascita', ['class' => '']) }}
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
                            {{ Form::label('password-confirm', 'Conferma password', ['class' => '']) }}
                            {{ Form::password('password_confirmation', ['class' => 'register__input', 'id' => 'password-confirm']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div  class="register__field">
                            {{ Form::label('telefono', 'Numero di telefono', ['class' => '']) }}
                            {{ Form::number('telefono', '', ['class' => 'register__input', 'id' => 'telefono']) }}
                            @if ($errors->first('telefono'))
                            <ul class="errors">
                                @foreach ($errors->get('telefono') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="tipologia">
                            {{ Form::label('locatario', 'Locatario', ['class' => '']) }}
                            {{ Form::radio('role', '', ['class' => '', 'id' => 'locatario']) }}

                            {{ Form::label('locatore', 'Locatore', ['class' => '']) }}
                            {{ Form::radio('role', '', false, ['class' => '', 'id' => 'locatore']) }}
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="container-form-btn">                
                            {{ Form::submit('Registra', ['class' => 'register__submit']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>
@endsection