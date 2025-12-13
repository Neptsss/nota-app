<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\nasabah;
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
            "tgl_transaksi" => "required|date",
            "jenis_transaksi" => "required",
            "nama_nasabah" => "required",
            "no_hp" => "required",
            "jenis_id" => "required",
            "no_id" => "required",
            "mata_uang" => "required",
            "jumlah" => "required|numeric",
            "rate" => "required|numeric",
            "jumlah_rp" => "required",
        ]);
        if ($validate) {
            // nasabah
            $nasabah = nasabah::where('no_hp', $validate["no_hp"])->first();
            if (!$nasabah) {
               $nasabah = nasabah::create([
                    "nama_nasabah" => $validate['nama_nasabah'],
                    "no_hp" => $validate['no_hp'],
                    "jenis_id" => $validate['jenis_id'],
                    "no_id" => $validate["no_id"]
                ]);
            } else {
                $nasabah->updated([
                    "jenis_id" => $validate['jenis_id'],
                    "no_id" => $validate['no_id']
                ]);
            }

            // dd($nasabah);
            // Transaksi
            $sub_total = str_replace('.','', $validate['jumlah_rp']);
            transaksi::create([ 
                "no_transaksi" => $validate['no_transaksi'],
                "tgl_transaksi" => $validate['tgl_transaksi'],
                "id_nasabah" => $nasabah->id,
                "jenis_transaksi" => $validate['jenis_transaksi'],
                "total_harga" => $sub_total
            ]);

            notify()->success('Data transaksi berhasil disimpan');
            return redirect()->route('transaksi.index');
        }
        notify()->error("Transaksi gagal disimpan");
        return back();
    }
}
