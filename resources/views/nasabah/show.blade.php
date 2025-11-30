@extends('template.layout')
@section('content')

<div class="mb-10">
    <a href="{{ route('nasabah.index') }}" class="mb-5 block border border-blue-500 transition hover:-translate-y-1 px-4 py-2 rounded-md max-w-28 text-center duration-300 hover:bg-blue-600 hover:text-white hover:font-semibold hover:shadow-md hover:shadow-blue-600/75">
        Kembali
    </a>

    <p class="text-2xl font-bold text-[#0e53a7] mt-10">Daftar Transaksi</p>
</div>

<table class=" table-bordered border-collapse border border-gray-400 w-full">
    <thead>
        <th class="border border-gray-300 p-3">Nama</th>
        <th class="border border-gray-300 p-3">Jenis Id</th>
        <th class="border border-gray-300 p-3">No ID</th>
        <th class="border border-gray-300 p-3">No HP</th>
        <th class="border border-gray-300 p-3">Action</th>
    </thead>
    <tbody>
        <tr>
            <td class="border border-gray-300 p-3">Transaksi 1</td>
            <td class="border border-gray-300 p-3">123213</td>
            <td class="border border-gray-300 p-3">321</td>
            <td class="border border-gray-300 p-3">321321</td>
            <td class="border border-gray-300 p-3 ">
                <a href=""
                    class="flex justify-center items-center mx-auto w-10 h-8 rounded-md px-4 py-2 group transition ease-in-out  bg-blue-600 hover:-translate-y-1 hover:shadow-md hover:shadow-blue-500/75  duration-500">
                    <i class="fa-solid fa-eye block text-white "></i>
                </a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
