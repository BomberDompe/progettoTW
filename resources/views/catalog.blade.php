@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

<!-- inizio sezione prodotti -->
@section('content')

<div class="container">
    
    <div class="prod">
                <div class="oneitem">
                    <div class="imagepro">
                        <img src="http://localhost/laraProj/public/images/products/gigachad.jpg" class="imagefrm">
                     </div>
                    <div class="infopro">
                        <h2 class="titlepro">Indirizzo </h2>
                        <div class="adress">
                            Via cesare cremonini 25
                        </div>
                        <div class="propapp">
                            <div class="casel">
                                IO
                            </div>
                            <div class="casel">
                                SONO
                            </div>
                            <div class="casel">
                                AGENDA
                            </div>
                            
                        </div>
                        <p class="metapro">Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. </p>
                    </div>
                    <div class="pricebox">
                        <div class="price">
                            3000€
                            
                        </div>
                        <div class="functional-buttons">
                            <ul>
                                <li><a>Dettagli</a></li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

@endsection


