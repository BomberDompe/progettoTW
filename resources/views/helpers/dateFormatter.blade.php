@php
use Carbon\Carbon;
    $inizio = Carbon::parse($inizio)->format('d/m/Y');
    $fine = Carbon::parse($fine)->format('d/m/Y');
@endphp
Dal {{ $inizio }} al {{ $fine }}