<div class="sidebar">
    <a href="{{ route('utente') }}">Dati Account</a>
    <a href="">Modifica Account</a>
    <br>
    <br>
    @can('isLocatario')
    <a href="{{ route('optionedview') }}" metod>Offerte selezionate</a>
    @endcan
    @can('isLocatore')
    <a href="{{ route('offerview') }}">Le tue offerte</a>
    @endcan
    <a href="{{ route('chat') }}">Messaggi</a>
</div>