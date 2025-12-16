<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use App\Models\transaksi;
use Illuminate\Http\Request;

class nasabahController extends Controller
{
    public function index()
    {
        return view('nasabah.nasabah', [
            "title" => "Nasabah",
            "header" => "Daftar Nasabah",
            "nasabah" => nasabah::all()
        ]);
    }

    public function show(nasabah $nasabah)
    {
        return view('nasabah.show-nasabah', [
            "title" => $nasabah->nama_nasabah . " | Daftar Transaksi",
            "header" => "Daftar Transaksi " . $nasabah->nama_nasabah,
            "nasabah" => $nasabah,
            "transaksi" => $nasabah->transaksi
        ]);
    }
}
