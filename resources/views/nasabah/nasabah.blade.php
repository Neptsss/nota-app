@extends('template.layout')
@section('content')
<table>
    <thead>
        <td>Nama</td>
        <td>Jenis Id</td>
        <td>No ID</td>
        <td>No HP</td>
        <td>Foto id</td>
    </thead>
    <tbody>
        @foreach ($nasabah as $item)
        <tr>
            <td>{{ $item->nama_nasabah }}</td>
            <td>{{ $item->jenis_id }}</td>
            <td>{{ $item->no_id }}</td>
            <td>{{ $item->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
