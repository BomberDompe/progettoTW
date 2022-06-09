<div class="sidebar">
    <a href="{{ route('profile') }}">Profilo</a>
    @can('isLocatario')
    <br>
    <br>
    <a href="{{ route('optionedview') }}">Offerte selezionate</a>
    <a href="{{ route('chat') }}">Messaggi</a>
    @endcan
    @can('isLocatore')
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