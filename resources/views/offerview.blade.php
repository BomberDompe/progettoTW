@extends('layouts.private')

@section('title', 'Le tue offerte')

@section('content')

@push('custom-scripts')      
<!-- Include file JavaScript per i filtri -->      
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/offerListFunction.js") }}"></script>
@endpush

<div class="container-listoffer">
    @isset($offerList)
    @foreach ($offerList as $offer)

    <div class="element-list">
        <div class="container">
            {{ $offer->titolo }}
        </div>
    </div>
    <div  class="offerta container" style="display: none">
        ciaoooooooooooo
    </div>

    @endforeach

    @endisset
</div>





@endsection
