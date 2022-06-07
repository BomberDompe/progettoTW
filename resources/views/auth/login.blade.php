@extends('layouts.public')

@section('title', 'Regolamento')

@section('content')
<div class="bg_image">
    <div class="screen__login">
        <div class="screen__content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        {{ Form::open(array('route' => 'login', 'class' => 'login')) }}
                        <div class="flex-center">
                            <h3 class="login__title">Login</h3>  
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
                        <div class="flex-center">
                            {{ Form::submit('Login', ['class' => 'login__submit']) }}
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <div class="screen__background">

            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div> 

</div>
@endsection

