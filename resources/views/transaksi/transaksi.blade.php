@extends('template.layout')
@section('content')
<p class="text-2xl underline">Hello World</p>
<a href="{{ route('transaksi.create') }}" class="block w-1/4 text-center px-4 py-2 border-blue-500 border my-5 rounded-md transition-all duration-300 hover:shadow-md shadow-blue-500/60 hover:bg-blue-500 hover:text-white hover:-translate-y-1">Tambah Transaksi</a>
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
        <th class="border-4 border-slate-700 p-2">Action</th>
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
    <td class="border-4 border-slate-700 p-2">
        <div class="flex justify-center gap-2">
        <a href="" class="border my-5 rounded-md px-2 py-1 block hover:bg-sky-500 hover:text-white hover:-translate-y-1 transition-all duration-300"><i class="fa-solid fa-eye"></i></a>
        <a href="" class="border my-5 rounded-md px-2 py-1 block hover:bg-green-600 hover:text-white hover:-translate-y-1 transition-all duration-300"><i class="fa-solid fa-print"></i></a>
        <a href="" class="border my-5 rounded-md px-2 py-1 block hover:bg-yellow-500 hover:text-white hover:-translate-y-1 transition-all duration-300"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="" class="border my-5 rounded-md px-2 py-1 block hover:bg-red-600 hover:text-white hover:-translate-y-1 transition-all duration-300"><i class="fa-solid fa-trash-can"></i></a>
        </div>

    </td>
</tr>
</tbody>

</table>
</div>


@endsection

