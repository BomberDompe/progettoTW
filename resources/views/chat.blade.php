@extends('layouts.private')

@section('title', 'Chat')

@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per i filtri -->      
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/chatFunctions.js") }}"></script>
<script>
    
    // Imposta le rotte globali
    $(function () {
        messageRoute  = "{{ route('chat.message') }}";
        unreadRoute = "{{ route('chat.unread') }}";
        audioRoute = "{{ asset('assets/audio/message-sent.mp3') }}";
    });
    
</script>
    @if($newUserId)
    <script>
        $(function () {
            $("#convListElem_" + "{{ $newUserId }}").trigger('click');
        });
    </script>
    @endif
@endpush

<!-- Inizio ycontenuto --> 
<div class="container">
    <div id="chat-container">
        <!-- Inizio sezione sinistra --> 
	<div class="chat-aside">
		<div class="chat-header">
                    <div>
                        <h4>Conversazioni</h4>
                        <h5> Login effettuato come "{{ Auth::user()->name }} {{ Auth::user()->surname }}"</h5>
                    </div>
		</div>
            
                
                <!-- Inizio lista conversazioni --> 
		<ul>
                @isset($conversationList)
                    @foreach($conversationList as $conversation)
			<li id="convListElem_{{ $conversation["userData"]->id }}">
                                <div class="profile-picture">
                                    <div>
                                        <b>
                                            {{ substr($conversation["userData"]->name,    0, 1).
                                               substr($conversation["userData"]->surname, 0, 1) }}
                                        </b>
                                    </div>
                                </div>
				<div>
					<h2>
                                            {{ $conversation["userData"]->name }}
                                            {{ $conversation["userData"]->surname }}
                                        </h2>
					<h3 id="unreadNotifier">
                                        @if($conversation["messageList"]["numUnread"] == 0)
						<span class="status green"></span>
						Nessun nuovo messaggio
                                        @elseif($conversation["messageList"]["numUnread"] == 1)
                                                <span class="status orange"></span>
                                                Hai un nuovo messaggio
                                        @else
                                                <span class="status orange"></span>
						Hai {{ $conversation["messageList"]["numUnread"] }} nuovi messaggi
                                        @endif
					</h3>
				</div>
			</li>
                    @endforeach
                @endisset
                        <!-- Conversazione di default (parte sinistra) --> 
                        <li id="convListElem_default">
				<img src="{{asset('assets/images/robot-icon.png')}}">
				<div>
                                    <h2>
                                        Botty
                                    </h2>
					<h3>
						<span class="status blue-default" style='' 0'></span>
						Ciao, io sono Botty!
					</h3>
				</div>
			</li>
		</ul>
	</div>
        <!-- Inizio sezione destra --> 
	<div class="chat-main">
        @isset($conversationList)
            @foreach($conversationList as $conversation)
                <div class="hidden" id="conv_{{ $conversation["userData"]->id }}">
                    <div class="chat-header">
                            <div class="profile-picture" id="profile-details">
                                        <div>
                                            <b>
                                                {{ substr($conversation["userData"]->name,    0, 1).
                                                   substr($conversation["userData"]->surname, 0, 1) }}
                                            </b>
                                        </div>
                            </div>
                            <div>
                                    <h1> Chat con {{ $conversation["userData"]->name }}
                                                  {{ $conversation["userData"]->surname }}</h1>
                                    <h2 id="counter">Già {{ $conversation["messageList"]["messages"]->count() }} messaggi</h2>
                            </div>
                            @can('isLocatore')
                            <div class="hidden" id="pop">
                                <h4>Informazioni aggiuntive</h4>
                                <p>Data di nascita: {{ date_format(date_create($conversation["userData"]->data_nascita), 'd/m/Y') }}<p>
                                <p>Genere: {{ $conversation["userData"]->genere }}<p>
                                @isset($conversation["userData"]->comune_residenza)
                                <p>Residenza: {{ $conversation["userData"]->comune_residenza }} </p>
                                @endisset()
                                @isset($conversation["userData"]->telefono)
                                <p>Num. Telefono: {{ $conversation["userData"]->telefono }} </p>
                                @endisset()
                            </div>
                        @endcan
                    </div>
                    <ul id="chat">
                    @foreach($conversation["messageList"]["messages"] as $message)
                        @if($message->mittente_id == Auth::id())
                            <li class="me">
                                    <div class="entete">
                                            @if($message->visualizzato == false)
                                            <h2>(Non visualizzato)</h2>
                                            @endif
                                            <h3>@include('helpers/timestampFormatter', ['timestamp' => $message->timestamp]) - </h3>
                                            <h2>Tu</h2>
                                            <span class="status blue"></span>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                            {{ $message->contenuto }}
                                    </div>
                            </li>
                        @else
                            <li class="you">
                                    <div class="entete">
                                            <span class="status green"></span>
                                            <h2>{{ $conversation["userData"]->name }}</h2>
                                            <h3> - @include('helpers/timestampFormatter', ['timestamp' => $message->timestamp])</h3>
                                            @if($message->visualizzato == false)
                                                <h2 id='unread'>(Nuovo)</h2>
                                            @endif
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                            {{ $message->contenuto }}
                                    </div>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                    <div class="chat-footer">
                        {{ Form::open(array('id' => 'form_'.$conversation["userData"]->id, 'class' => '')) }}
                        {{ Form::textarea('contenuto', '', ['placeholder' => 'Scrivi un messaggio', 'id' => 'message_'.$conversation["userData"]->id ]) }}
                        <div>
                            {{ Form::submit('Invia', ['id' => 'submitButton']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div> 
            @endforeach
        @endisset
                <!-- Conversazione di default (parte destra) --> 
                <div class="hidden" id="conv_default">
                    <div class="chat-header">
                            <img src="{{asset('assets/images/robot-icon.png')}}">     
                            <div>
                                    <h1>Botty</h1>
                                    <h2>Assistente robot</h2>
                            </div>
                    </div>
                    <ul id="chat">
                            <li class="you">
                                    <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Botty</h2>
                                            <h3>- Funzionamento delle conversazioni</h3>
                                    </div>
                                    <div class="triangle"></div>
                                    <div class="message">
                                        Benvenuto nella sezione chat! Qui potrai comunicare con
                                        altri utenti registrati. 
                                        @can('isLocatario')
                                        Gli utenti Locatori di cui hai opzionato almeno un'offerta potranno risponderti
                                        poiché l'opzionamento comporta l'invio di un messaggio automatico, ma puoi comunque
                                        contattarne uno senza averne opzionato un'offerta (pulsante "Chat" in fondo alla
                                        scheda dettagli dell'offerta). Ricorda però che l'opzionamento è necessario affinché
                                        la tua proposta possa essere accettata.
                                        @endcan
                                        @can('isLocatore')
                                        Gli utenti Locatari interessati alle tue offerte potranno scriverti, ma 
                                        puoi comunque rispondere a quelli che hanno opzionato una tua offerta.
                                        Un Locatario dovrà necessariamente opzionare l'offerta che gli interessa
                                        affinché tu possa assegnargliela.
                                        @endcan
                                    </div>
                            </li>
                    </ul>
                    <div class="chat-footer">
                        <div class= "default-div">
                            Chat disabilitata
                        </div>
                    </div>
                </div>
        </div>
    </div>       
</div>
@endsection