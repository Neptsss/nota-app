@extends('template.layout')
@section('content')
<a href="{{ route('transaksi.create') }}"
    class="block w-1/4  text-center px-4 py-2 border-blue-500 border my-5 rounded-md transition-all duration-300 hover:shadow-md shadow-blue-500/60 hover:bg-blue-500 hover:text-white hover:-translate-y-1 hover:font-bold">Tambah
    Transaksi</a>
<div>
    <table class="table-auto table">
        <thead>
            <t>
                <th class="border border-slate-700 p-4">No Transaksi</th>
                <th class="border border-slate-700 p-4">Tanggal Transaksi</th>
                <th class="border border-slate-700 p-4">Jenis Transaksi</th>
                <th class="border border-slate-700 p-4">Nama Nasabah</th>
                <th class="border border-slate-700 p-4">Jenis ID</th>
                <th class="border border-slate-700 p-4">Mata Uang</th>
                <th class="border border-slate-700 p-4">Total</th>
                <th class="border border-slate-700 p-4">Action</th>
            </t </thead>

        <tbody>
            <tr>
                <td class="border border-slate-700 p-4">123</td>
                <td class="border border-slate-700 p-4">15</td>
                <td class="border border-slate-700 p-4">Beli</td>
                <td class="border border-slate-700 p-4">Noval</td>
                <td class="border border-slate-700 p-4">KTP</td>
                <td class="border border-slate-700 p-4">IDR</td>
                <td class="border border-slate-700 p-4">RP</td>
                <td class="border border-slate-700 p-4">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('transaksi.show') }}"
                            class=" my-5 rounded-md px-2 py-1 block bg-sky-500 text-white hover:scale-110 hover:shadow-md hover:shadow-sky-500/60 transition-all duration-300"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href=""
                            class=" my-5 rounded-md px-2 py-1 block bg-green-600 text-white hover:scale-110 hover:shadow-md hover:shadow-green-600/60 transition-all duration-300"><i
                                class="fa-solid fa-print"></i></a>
                        <a href=""
                            class=" my-5 rounded-md px-2 py-1 block bg-yellow-500 text-white hover:scale-110 hover:shadow-md hover:shadow-yellow-500/60 transition-all duration-300"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <form action="" method="" class="deleteBtn cursor-pointer">

                            <button type="submit"
                                class=" my-5 rounded-md px-2 py-1 block bg-red-600 text-white hover:scale-110 hover:shadow-md hover:shadow-red-600/60 transition-all duration-300"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>

                </td>
            </tr>
        </tbody>

    </table>
</div>


@endsection
