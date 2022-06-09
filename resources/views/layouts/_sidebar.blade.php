<div class="sidebar">
    <a href="{{ route('profile') }}">Profilo</a>
    @can('isLocatario')
    <a href="{{ route('optionedview') }}">Offerte selezionate</a>
    <a href="{{ route('chat', 0) }}">Messaggi</a>
    @endcan
    @can('isLocatore')
    <a href="{{ route('offerview') }}">Le tue offerte</a>
    <a href="{{ route('chat', 0) }}">Messaggi</a>
    @endcan
    @can('isAdmin')
    <a href="{{ route('faqview') }}">Gestione F.A.Q</a>
    <a href="{{ route('stats') }}">Statische ApartRent</a>
    @endcan

</div>
