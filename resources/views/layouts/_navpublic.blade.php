<a class="navbar-brand" href="{{ route('home') }}" title="Home" ><h2>ApartRent</h2></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" title="Home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('catalog') }}" title="Catalogo">Catalogo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('faqs') }}" title="Faq">F.A.Q.</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rules') }}" title="Rules">Regolamento</a>
        </li>
    </ul>
</div>


<div class="functional-buttons">
    <ul>
        @auth
        <li><a href="{{ route('utente') }}">Account</a></li>
        <li><a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @endauth  
        @guest
        <li><a href="{{ route('login') }}">Log in</a></li>
        <li><a href="{{ route('register') }}">Registrati</a></li>
        @endguest
    </ul>
</div>

<!--
Include file JavaScript per il Toggle del menù
-->
<script type="text/javascript" src="{{ asset("assets/js/toggleButton.js") }}"></script>