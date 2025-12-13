<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.transaksi', [
            "title" => "Transaksi",
            "header" => "Daftar Transaksi",
            "transaksi" => transaksi::all()
        ]);
    }

    public function show()
    {
        return view('transaksi.show', [
            "title" => "Transaksi | Detail Transaksi",
            "header" => "Detail Transaksi"
        ]);
    }

    public function create()
    {
        return view('transaksi.create', [
            "title" => "Transaksi | Tambah Create",
            "header" => "Nota Penukaran Valuta Asing"
        ]);
    }
    public function edit()
    {
        return view('transaksi.edit', [
            "title" => "Transaksi | Edit ",
            "header" => "Edit Nota Penukaran Valuta Asing"
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "no_transaksi" => "required",
            "tgl_transaksi" => "required",
            "jenis_transaksi" => "required",
            "nama_nasabah" => "required",
            "no_hp" => "required",
            "jenis_id" => "required",
            "no_id" => "required",
            "mata_uang" => "required",
            "jumlah" => "required",
            "rate" => "required",
            "jumlah_rp" => "required",
        ]);
        if ($validate) {
            notify()->success('Data transaksi berhasil disimpan');
            return redirect()->route('transaksi.index');
        }
        notify()->error("Transaksi gagal disimpan");
        return back();
    }
}
