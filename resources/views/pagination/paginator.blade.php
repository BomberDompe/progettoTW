@if ($paginator->lastPage() != 1)
<div id="pagination">
   <!-- {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} ---  -->

    <!-- Link alla prima pagina -->
    @if (!$paginator->onFirstPage())
    <a href="{{ $paginator->url(1) }}">&Lt;</a>&ensp;
    @else
    &Lt; &ensp;
    @endif

    <!-- Link alla pagina precedente -->
    @if ($paginator->currentPage() != 1)
        <a href="{{ $paginator->previousPageUrl() }}">&LT; </a> 
    @else
        &LT;  
    @endif

    <!-- Link alla pagina successiva -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"> &GT;</a>&ensp; 
    @else
     &GT; &ensp; 
    @endif

    <!-- Link all'ultima pagina -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->url($paginator->lastPage()) }}">&Gt;</a>
    @else
    &Gt;
    @endif
</div>
@endif
