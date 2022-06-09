@extends('layouts.private')

@section('title', 'Lista delle F.A.Q.')

@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per i filtri -->      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/faqListFunction.js") }}"></script>
@endpush


<div class="container-listfaq">

        <div class="container">
            <div class="row">
                <div class="flip-card">
                    <a href="{{ route('faqview.insertview') }}">
                        <div class="flip-card-inner">
                            <div class="flip-card-front flex-center">
                                <p class="new_offer">Nuova F.A.Q</p>
                            </div>
                            <div class="flip-card-back flex-center">
                                <div class="new_image">
                                    <img src="{{asset('assets\images\button-add.png')}}" width="60px" height="60px">
                                </div>
                            </div>
                        </div>      
                    </a>
                </div>  
            </div>
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
                <div class="faqlist-buttons flex-center">
                    <ul>
                        <li><a href="{{ route('faqview.updateview', [$faq->faq_id]) }}">Modifica</a></li>
                        <li><a class="confirmation"  href="{{ route('faqview.delete', [$faq->faq_id]) }}" >Elimina</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endisset
</div>


@endsection
