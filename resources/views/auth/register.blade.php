@extends('layouts.public')

@section('title', 'Regolamento')

@section('content')
<div class="bg_image">
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                {{ Form::open(array('route' => 'register', 'class' => 'register')) }}
                <h3>Registrazione</h3>
                <div style="display: inline-flex;">
                    <div id="leftreg">
                        <div  class="register__field">
                            {{ Form::label('nome', 'Nome', ['class' => '']) }}
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
                        <div  class="register__field">
                            {{ Form::label('password-confirm', 'Conferma password', ['class' => '']) }}
                            {{ Form::password('password_confirmation', ['class' => 'register__input', 'id' => 'password-confirm']) }}
                        </div>
                    </div>
                    <div id="rightreg">
                        <div  class="register__field" style="display: inline-flex;">
                            <div class="genere">
                                {{ Form::label('m_sex', 'M', ['class' => '']) }}
                                {{ Form::radio('sex', '', ['class' => '', 'id' => 'm_sex']) }}
                                {{ Form::label('f_sex', 'F', ['class' => '']) }}
                                {{ Form::radio('sex', '', false, ['class' => '', 'id' => 'f_sex']) }}
                            </div>

                            {{ Form::label('nascita', 'Data di nascita', ['class' => '']) }}
                            {{ Form::date('b_day','', ['class' => '', 'id' => 'nascita','min' => '2000-01-01']) }}
                        </div>

                        <div  class="register__field" style="margin: 30px 60px;">
                            {{ Form::label('whereB', 'Comune di nascita', ['class' => '']) }}
                            {{ Form::text('whereB', '', ['class' => 'register__input', 'id' => 'whereB']) }}
                            @if ($errors->first('whereB'))
                            <ul class="errors">
                                @foreach ($errors->get('whereB') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div  class="register__field" style="margin: 30px 60px;">
                            {{ Form::label('numbertel', 'Numero di telefono', ['class' => '']) }}
                            {{ Form::text('numbertel', '', ['class' => 'register__input', 'id' => 'numbertel']) }}
                            @if ($errors->first('numbertel'))
                            <ul class="errors">
                                @foreach ($errors->get('numbertel') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="tipologia">
                            {{ Form::label('typel', 'locatario', ['class' => '']) }}
                            {{ Form::radio('type', '', ['class' => '', 'id' => 'typel']) }}
                        </div>
                        <div class="tipologia">
                            {{ Form::label('typeL', 'locatore', ['class' => '']) }}
                            {{ Form::radio('type', '', false, ['class' => '', 'id' => 'typeL']) }}
                        </div>
                    </div>
                    <br clear="all" />
                </div>
                {{ Form::submit('Registra', ['class' => 'register__submit']) }}
                {{ Form::close() }}
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</div>
@endsection