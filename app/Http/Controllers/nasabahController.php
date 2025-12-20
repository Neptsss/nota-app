<?php

namespace App\Http\Controllers;

use App\Models\mata_uang;
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
            "nasabah" => nasabah::FilterNasabah(request(['nama_nasabah', 'no_hp', 'no_id', 'jenis_id']))->get()
        ]);
    }

    public function show(nasabah $nasabah)
    {
        return view('nasabah.show-nasabah', [
            "title" => $nasabah->nama_nasabah . " | Daftar Transaksi",
            "header" => "Daftar Transaksi " . $nasabah->nama_nasabah,
            "nasabah" => $nasabah,
            "transaksi" => transaksi::where('nasabah_id', $nasabah->id)->filters(request(['no_transaksi','tgl_transaksi', 'jenis_transaksi','mata_uang']))->get(),
            "mata_uang" => mata_uang::all()
        ]);
    }
}
