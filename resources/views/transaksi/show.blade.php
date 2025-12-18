@extends('template.Layout')
@section('content')
<a href="{{ route('transaksi.index')}}" class="block w-36 max-w-[20%] text-center px-4 py-2 border-primary border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-primary/60 hover:bg-primary hover:text-white hover:-translate-y-1 hover:font-bold">
    <i class="fa-regular fa-circle-left"></i>
    <span>Kembali</span>
</a>
<div class="bg-white my-5 rounded-md p-6 shadow-md">
    <p class="mb-4 text-2xl text-primary font-semibold text-shadow-sm">Detail Transaksi</p>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Tanggal Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Jenis Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Nama Nasabah</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Jenis ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Mata Uang</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Rate</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Total (RP)</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="border border-slate-200 px-4 py-2 ">{{\Carbon\Carbon::parse($transaksi->tgl_transaksi)->locale('id')->translatedFormat('d F Y')}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->jenis_transaksi}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->nasabah->nama_nasabah}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->nasabah->jenis_id}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{$transaksi->detail_transaksi->mata_uang}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{number_format($transaksi->detail_transaksi->rate, 2, ',', '.')}}</td>
                <td class="border border-slate-200 px-4 py-2 ">{{number_format($transaksi->detail_transaksi->sub_total, 2, ',', '.')}}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="bg-white my-5 rounded-md p-6 shadow-md">
    <p class="mb-4 text-2xl text-primary font-semibold text-shadow-sm">Nasabah</p>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Nama</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">No HP</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Jenis ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">No ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white">Foto ID</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->nama_nasabah}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->no_hp}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->jenis_id}}</td>
                <td class="border border-slate-200 px-4 py-2">{{$nasabah->no_id}}</td>
                <td class="border border-slate-200 px-4 py-2"></td>
            </tr>
        </tbody>
    </table>
    @endsection