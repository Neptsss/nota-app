@extends('template.layout')
@section('content')
<p class="text-2xl underline">Hello World</p>
<div>
<table>
<thead>
    <tr>
        <th class="border-4 border-slate-700 p-2">No Transaksi</th>
        <th class="border-4 border-slate-700 p-2">Tanggal Transaksi</th>
        <th class="border-4 border-slate-700 p-2">Jenis Transaksi</th>
        <th class="border-4 border-slate-700 p-2">Nama Nasabah</th>
        <th class="border-4 border-slate-700 p-2">Jenis ID</th>
        <th class="border-4 border-slate-700 p-2">Mata Uang</th>
        <th class="border-4 border-slate-700 p-2">Total</th>
    </tr>
</thead>

<tbody>
<tr>
    <td class="border-4 border-slate-700 p-2">123</td>
    <td class="border-4 border-slate-700 p-2">15</td>
    <td class="border-4 border-slate-700 p-2">Beli</td>
    <td class="border-4 border-slate-700 p-2">Noval</td>
    <td class="border-4 border-slate-700 p-2">KTP</td>
    <td class="border-4 border-slate-700 p-2">IDR</td>
    <td class="border-4 border-slate-700 p-2">RP</td>
</tr>
</tbody>

</table>
</div>


@endsection

