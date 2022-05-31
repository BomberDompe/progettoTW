<div class="sidebar">
    <a href="{{ route('utente') }}">Dati Account</a>
    <a href="">Modifica Account</a>
    <br>
    <br>
    <a href="">Messaggi</a>
    @can('isLocatario')
    <a href="">Offerte selezionate</a>
    @endcan
    @can('isLocatore')
    <a href="">Alloggi</a>
    @endcan
</div>