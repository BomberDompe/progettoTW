@extends('layouts.public')

@section('title', 'Dettagli')

@section('content')
<div class="container">
    <h1 style=" text-align: center; padding-top: 20px;">Titolo</h1>
    <div style=" margin: 20px 0;">
        <div style=" text-align: center; margin-bottom: 10px;">
            <img src="http://localhost/laraProj/public/images/products/gigachad.jpg" style=" width: 770px; height: 470px;">
        </div>
        <table>
<caption>Tabelle spese di Marzo</caption>
<thead>
<tr>
<th>Data</th>
<th>Operazione</th>
<th>Importo €</th>
</tr>
</thead>
<tbody>
<tr>
<td>01/03</td>
<td>Amazon</td>
<td>26</td>
</tr>
<tr>
<td>03/03</td>
<td>Internet</td>
<td>40</td>
</tr>
<tr>
<td>05/03</td>
<td>Spesa</td>
<td>85</td>
</tr>
<tr>
<td colspan="2">Totale</td>
<td>151</td>
</tr>
</tbody>
</table>
        </div>
@endsection