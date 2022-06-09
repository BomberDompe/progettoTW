@extends('layouts.public')

@section('title', 'F.A.Q.')

@section('content')
<div class="container">
    <div class="faq">
        <div class="section-heading">
        <h2>Domande frequenti</h2>
        </div>
            
        @isset($faqs)
            @foreach ($faqs as $faq)    
            <div class="faqdom">
                {{ $faq->domanda }}
            </div>
            <div class="faqrisp">
                {{ $faq->risposta }}
            </div>
            @endforeach
  
            <!--Paginazione-->
            @include('pagination.paginator', ['paginator' => $faqs])
    
        @endisset()
            
        </div>
        
</div>
@endsection
