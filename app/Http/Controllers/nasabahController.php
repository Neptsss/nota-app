<?php

namespace App\Http\Controllers;

use App\Models\mata_uang;
use App\Models\nasabah;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class nasabahController extends Controller
{
    public function index()
    {
        return view('nasabah.nasabah', [
            "title" => "Nasabah",
            "header" => "Daftar Nasabah",
            "nasabah" => nasabah::FilterNasabah(request(['nama_nasabah', 'no_hp', 'no_id', 'jenis_id']))->latest()->paginate(3)
        ]);
    }

    public function show(nasabah $nasabah)
    {
        return view('nasabah.show-nasabah', [
            "title" => $nasabah->nama_nasabah . " | Daftar Transaksi",
            "header" => "Daftar Transaksi " . $nasabah->nama_nasabah,
            "nasabah" => $nasabah,
            "transaksi" => transaksi::where('nasabah_id', $nasabah->id)->filters(request(['no_transaksi', 'tgl_transaksi', 'jenis_transaksi', 'mata_uang']))->get(),
            "mata_uang" => mata_uang::all()
        ]);
    }

    public function destroy(nasabah $nasabah)
    {
        $transaksi_nasabah = transaksi::where('nasabah_id', $nasabah->id)->get();
        foreach ($transaksi_nasabah as $transaksi) {
            $transaksi->delete();
        }

        $path_foto = public_path('img/foto_id/' . $nasabah->foto_id);

        if (File::exists($path_foto)) {
            File::delete($path_foto);
        }

        $nasabah->delete();

        notify()->success('Data nasabah berhasil dihapus');
        return back();
    }
}


