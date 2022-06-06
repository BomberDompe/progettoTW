@extends('layouts.private')

@section('title', 'F.A.Q. lista')

@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per i filtri -->      
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/faqListFunction.js") }}"></script>
@endpush


<div class="container-listfaq">

    <div class="domanda">
        <a href="{{ route('utente') }}">
            <div class="container">
                <div class="row">
                    <div class ="col-md-9">
                        <p class="new_faq">Nuova F.A.Q.</p>
                    </div>                      
                    <div class ="col-md-3">
                        <img src="{{asset('images\assets\images\button-add.png')}}" width="40" height="40" style="margin: 1px 0px;">
                    </div>
                </div>
            </div>
        </a>
    </div>

    @isset($faqList)
    @foreach ($faqList as $faq)
    <div class="domanda">
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <p>{{$faq->domanda}}</p>
                </div>
            </div>
        </div>
    </div>
    <div  class="risposta container" style="display: none">
        <div class="row">
            <div class ="col-md-12">
                <p>{{$faq->risposta}}</p>
            </div>
            <div class ="col-md-12">
                <div class="faqlist-buttons">
                    <ul>
                        <li><a href="#" >&ensp;Modifica&ensp;</a></li>
                        <li><a class="confirmation"  href="{{ route('faqview.delete', [$faq->faq_id]) }}" >&ensp;Elimina&ensp;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endisset
</div>


@endsection
