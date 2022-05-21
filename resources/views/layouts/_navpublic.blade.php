<a class="navbar-brand" href="{{ route('home') }}" title="Home" ><h2>ApartaRent</h2></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" title="Home">Home
                @if($request->is('admin/*'))<span class="sr-only">(current)</span>@endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.html">Catalogo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="services.html">F.A.Q.</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rules') }}">Regolamento</a>
        </li>
    </ul>
</div>

 @can('isLocatore')    
    <ul>
        <li><a href="{{ route('locatore') }}">Log out</a></li>
    </ul>
</div>       
 @endcan
 @can('isUser')
 <div>   
    <ul>
        <li><a href="{{ route('user') }}">Log out</a></li>
    </ul>
</div>
 @endcan
 @can('isAdmin')
 <div class="functional-buttons">
    <ul>
        <li><a href="{{ route('admin') }}">Log out</a></li>
    </ul>
</div>
 @endcan


<!--
@auth
.
.
.
@endauth
-->

@guest
<div class="functional-buttons">
    <ul>
        <li><a href="#">Log in</a></li>
        <li><a href="#">Registrati</a></li>
    </ul>
</div>
@endguest