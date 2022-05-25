<!-- PopUp Login/Register -->
<div style="height: 600px">

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                
                {{ Form::open(array('route' => 'login', 'class' => 'login')) }}
                <div  class="">
                    <h3>Login</h3>
                    <p>Utilizza questa form per autenticarti al sito</p>
                    <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
                </div>            
                <div  class="login__field">
                    {{ Form::label('username', 'Username', ['class' => '']) }}
                    {{ Form::text('username', '', ['class' => 'login__input', 'id' => 'username']) }}
                    @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            
                <div  class="login__field">
                    {{ Form::label('password', 'Password', ['class' => '']) }}
                    {{ Form::password('password', ['class' => 'login__input', 'id' => 'password']) }}
                    @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            
                <div class="">                
                    {{ Form::submit('Login', ['class' => '']) }}
                </div>
            
                {{ Form::close() }}
            
            </div>
        
            <div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div> 
    </div>
    
</div>
