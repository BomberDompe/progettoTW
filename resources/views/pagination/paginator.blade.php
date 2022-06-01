@if ($paginator->lastPage() != 1)
<div id="pagination">
    {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} ---

    <!-- Link alla prima pagina -->
    @if (!$paginator->onFirstPage())
        &nbsp;<a href="{{ $paginator->url(1) }}">Inizio</a>&nbsp;|
    @else
        Inizio |
    @endif
    <!--
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->url(1) }}">&Lt;</a>&ensp;
    @else
        &Lt; &ensp;
    @endif
    -->

    <!-- Link alla pagina precedente -->
    @if ($paginator->currentPage() != 1)
        &nbsp;<a href="{{ $paginator->previousPageUrl() }}">&lt; Precedente</a>&nbsp;|
    @else
        &lt; Precedente |
    @endif
    <!--
    @if ($paginator->currentPage() != 1)    
        <a href="{{ $paginator->previousPageUrl() }}">&LT; </a> 
    @else
        &LT;
    @endif
    -->

    <!-- Link alla pagina successiva -->
    @if ($paginator->hasMorePages())
        &nbsp;<a href="{{ $paginator->nextPageUrl() }}">Successivo &gt;</a>&nbsp;| 
    @else
        Successivo &gt; |
    @endif
    <!--    
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"> &GT;</a>&ensp; 
    @else
       &GT; &ensp; 
    @endif
    -->

    <!-- Link all'ultima pagina -->
    @if ($paginator->hasMorePages())
        &nbsp;<a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
    @else
        Fine
    @endif
    <!--   
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->url($paginator->lastPage()) }}">&Gt;</a>
    @else
        &Gt;
    @endif
    -->    
</div>
@endif





