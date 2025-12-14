@extends('template.layout')
@section('content')
<a href="{{ route('transaksi.create') }}"
    class="block w-1/4  text-center px-4 py-2 border-blue-500 border my-5 rounded-md transition-all duration-300 hover:shadow-md shadow-blue-500/60 hover:bg-blue-500 hover:text-white hover:-translate-y-1 hover:font-bold">Tambah
    Transaksi</a>

    <div class="mt-10">
        <form action="" id="searchForm">
            <div class="border rounded-xl w-1/4 flex justify-between items-center px-2 ">
                <i class="fa-solid fa-magnifying-glass block"></i>
                <input type="text" class="w-full px-2 py-1  focus:outline-none rounded-md block" placeholder="Cari No Transaksi"
                    autofocus>
            </div>
        </form>
    </div>
    
<div class="mt-6">
    <table class="table-responsive w-full bg-white shadow-xl">
        <thead class="rounded-xl">
            <tr class="rounded-md">
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">No Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Tanggal Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis Transaksi</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Nama Nasabah</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Jenis ID</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Mata Uang</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Total (Rp)</th>
                <th class="border border-slate-200 px-4 py-2 bg-primary text-white ">Action</th>
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
                <td class="border border-slate-200 px-4 py-2">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('transaksi.show') }}"
                            class=" my-5 rounded-md px-2 py-1 block bg-sky-500 text-white hover:scale-110 hover:shadow-md hover:shadow-sky-500/60 transition-all duration-300"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href=""
                            class=" my-5 rounded-md px-2 py-1 block bg-green-600 text-white hover:scale-110 hover:shadow-md hover:shadow-green-600/60 transition-all duration-300"><i
                                class="fa-solid fa-print"></i></a>
                        <a href="{{route('transaksi.edit')}}"
                            class=" my-5 rounded-md px-2 py-1 block bg-yellow-500 text-white hover:scale-110 hover:shadow-md hover:shadow-yellow-500/60 transition-all duration-300"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <form action="" method="" class="deleteBtn cursor-pointer">
                            <button type="submit"
                                class="cursor-pointer my-5 rounded-md px-2 py-1 block bg-red-600 text-white hover:scale-110 hover:shadow-md hover:shadow-red-600/60 transition-all duration-300"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>

                </td>
            </tr>
             @endforeach
        </tbody>

    </table>
</div>


@endsection
