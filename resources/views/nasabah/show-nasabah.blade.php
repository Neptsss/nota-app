@extends('template.layout')
@section('content')
<a href="{{ route('nasabah.index')}}" class="block w-36 max-w-[20%] text-center px-4 py-2 border-primary border my-5 rounded-md transition-all
duration-300 hover:shadow-md shadow-primary/60 hover:bg-primary hover:text-white hover:-translate-y-1 hover:font-bold">
    <i class="fa-regular fa-circle-left"></i>
    <span>Kembali</span>
</a>
<div class="mt-6 bg-white p-6 rounded-md shadow-md">
    <p class="text-2xl text-primary font-bold mb-4 text-shadow-sm">Daftar Transaksi {{ $nasabah->nama_nasabah }}</p>
    <table class="w-full">
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
                <td class="border border-slate-200 px-4 py-2">{{$item->detail_transaksi->mata_uang }}</td>
                <td class="border border-slate-200 px-4 py-2">{{number_format($item->detail_transaksi->sub_total, 2, ',', '.')}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
