<!-- PopUp Login/Register -->

<div class="screen">
    <div class="screen__content">
        {{ Form::open(array('route' => 'register', 'class' => 'register')) }}
        <h3>Registrazione</h3>

        <div id="contentreg">
            <div id="leftreg">
                <p><div  class="register__field">
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
            </div>
            <div id="rightreg">
                        
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
