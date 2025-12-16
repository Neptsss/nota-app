@extends('template.Layout')
@section('content')
<a href="{{ route('transaksi.index') }}"
    class="block w-1/4  text-center px-4 py-2 border-blue-500 border my-5 rounded-md transition-all duration-300 hover:shadow-md shadow-blue-500/60
     hover:bg-blue-500 hover:text-white hover:-translate-y-1 hover:font-bold">Kembali</a>
    <div>
        <p class="mb-4 text-xl">Detail Transaksi</p>
        <table class="table-auto table">
            <thead>
                <tr>
                    <th class ="border border-gray-700 p-4">Tanggal Transaksi</th>
                    <th class ="border border-gray-700 p-4">Jenis Transaksi</th>
                    <th class ="border border-gray-700 p-4">Nama Nasabah</th>
                    <th class ="border border-gray-700 p-4">Jenis ID</th>
                    <th class ="border border-gray-700 p-4">Mata Uang</th>
                    <th class ="border border-gray-700 p-4">Rate</th>
                    <th class ="border border-gray-700 p-4">Total (RP)</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="border border-gray-700 p-4">{{$transaksi->tgl_transaksi}}</td>
                    <td class="border border-gray-700 p-4">{{$transaksi->jenis_transaksi}}</td>
                    <td class="border border-gray-700 p-4">{{$transaksi->nasabah->nama_nasabah}}</td>
                    <td class="border border-gray-700 p-4">{{$transaksi->nasabah->jenis_id}}</td>
                    <td class="border border-gray-700 p-4">{{$transaksi->detail_transaksi->mata_uang}}</td>
                    <td class="border border-gray-700 p-4">{{$transaksi->detail_transaksi->rate}}</td>
                    <td class="border border-gray-700 p-4">{{$transaksi->detail_transaksi->sub_total}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <p class="mb-4 text-xl">Nasabah</p>
        <table class="table-auto table">
            <thead>
                <tr>
                    <th class="border border-gray-700 p-4">Nama</th>
                    <th class="border border-gray-700 p-4">No HP</th>
                    <th class="border border-gray-700 p-4">Jenis ID</th>
                    <th class="border border-gray-700 p-4">No ID</th>
                    <th class="border border-gray-700 p-4">Link Foto KTP</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="border border-gray-700 p-4">{{$nasabah->nama_nasabah}}</td>
                    <td class="border border-gray-700 p-4">{{$nasabah->no_hp}}</td>
                    <td class="border border-gray-700 p-4">{{$nasabah->jenis_id}}</td>
                    <td class="border border-gray-700 p-4">{{$nasabah->no_id}}</td>
                    <td class="border border-gray-700 p-4"></td>
                </tr>
            </tbody>
        </table>
    @endsection


