@extends('layouts.public')

@section('title', 'Regolamento')

@section('content')
<div class="bg_image">
    <div class="container">
        <div class="screen">
            <div class="screen__content">

                {{ Form::open(array('route' => 'login', 'class' => 'login')) }}

                <h3>Login</h3>     
                <div  class="login__field">
                    {{ Form::label('username', 'Username', ['class' => '']) }}
                    {{ Form::text('username', '', ['class' => 'login__input', 'id' => 'username', 'placeholder' => 'username']) }}
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


                {{ Form::submit('Login', ['class' => 'login__submit']) }}


                {{ Form::close() }}

            </div>

            <div class="screen__background">

                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div> 
    </div>
</div>
@endsection

