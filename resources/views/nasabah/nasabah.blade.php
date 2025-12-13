@extends('template.layout')
@section('content')
<div class="mt-20">
    <form action="" id="searchForm">
        <div class="border rounded-xl w-1/4 flex justify-between items-center px-2 ">
            <i class="fa-solid fa-magnifying-glass block"></i>
            <input type="text" class="w-full px-2 py-1  focus:outline-none rounded-md block" placeholder="Cari Nasabah" autofocus>
        </div>
    </form>
</div>
<table class="table-auto mt-3 border-collapse border border-gray-400">
    <thead class="bg-gray-300   font-bold">
        <tr>
            <th class=" border border-gray-400 p-4">No</th>
            <th class=" border border-gray-400 p-4">Nama</th>
            <th class=" border border-gray-400 p-4">No HP</th>
            <th class=" border border-gray-400 p-4">Jenis ID</th>
            <th class=" border border-gray-400 p-4">No ID</th>
            <th class=" border border-gray-400 p-4"> Foto KTP</th>
            <th class=" border border-gray-400 p-4"> Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($nasabah as $item)
        <tr>
            <td>{{ $item->nama_nasabah }}</td>
            <td>{{ $item->jenis_id }}</td>
            <td>{{ $item->no_id }}</td>
            <td>{{ $item->no_hp }}</td>
        </tr>
    </tbody>
</table>
@endsection
