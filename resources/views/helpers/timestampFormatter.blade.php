@php
use Carbon\Carbon;
    $giorno = Carbon::parse($timestamp)->format('d/m/Y');
    $ora = Carbon::parse($timestamp)->format('G:i');
@endphp
{{ $giorno }}, alle {{ $ora }}