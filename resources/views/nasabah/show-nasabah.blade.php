@extends('template.layout')
@section('content')
<p class="text-2xl text-primary font-bold ">Daftar Transaksi {{ $nasabah->nama_nasabah }}</p>
<a href="{{ route('nasabah.index')}}"
    class="block w-36 max-w-[20%] text-center px-4 py-2 border-blue-500 border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-blue-500/60 hover:bg-blue-500 hover:text-white hover:-translate-y-1 hover:font-bold">
    <i class="fa-regular fa-circle-left"></i>
    <span>Kembali</span>
</a>
<div class="mt-6">
    <table class="shadow-md">
        <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">No Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Tanggal Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Nama Nasabah</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Mata Uang</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Total (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
            <tr>
                <td class="border border-slate-200 px-4 py-2">{{$item->no_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->tgl_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->jenis_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->nasabah->nama_nasabah}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->nasabah->jenis_id}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->detail_transaksi->mata_uang ?? "IDR"}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$item->total_harga ?? "0"}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
