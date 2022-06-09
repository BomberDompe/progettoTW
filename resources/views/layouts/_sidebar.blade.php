<div class="sidebar">
    <a href="{{ route('utente') }}">Dati Account</a>
    @can('isLocatario')
    <a href="#">Modifica Account</a>
    <br>
    <br>
    <a href="{{ route('optionedview') }}" metod>Offerte selezionate</a>
    <a href="{{ route('chat') }}">Messaggi</a>
    @endcan
    @can('isLocatore')
    <a href="#">Modifica Account</a>
    <br>
    <br>
    <a href="{{ route('offerview') }}">Le tue offerte</a>
    <a href="{{ route('chat') }}">Messaggi</a>
    @endcan
    @can('isAdmin')
    <br>
    <br>
    <a href="{{ route('faqview') }}">Gestione F.A.Q</a>
    <a href="{{ route('stats') }}">Statische ApartRent</a>
    @endcan

</div>