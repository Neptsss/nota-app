<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\mata_uang;
use App\Models\nasabah;
use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index(Request $request)
    {
        // dd(request());
        // dd($request->all());
        return view('transaksi.transaksi', [
            "title" => "Transaksi",
            "header" => "Daftar Transaksi",
            "transaksi" => transaksi::filters(request(['no_transaksi','tgl_transaksi','jenis_transaksi',"nama_nasabah", "jenis_id", "mata_uang"]))->get(),
            "mata_uang" => mata_uang::all()
        ]);
    }

    public function show(transaksi $transaksi)
    {
        // dd($transaksi);
        return view('transaksi.show', [
            "title" => "Transaksi | Detail Transaksi",
            "header" => "Detail Transaksi",
            "transaksi" => $transaksi,
            "nasabah" => $transaksi->nasabah
        ]);
    }

    public function create()
    {
        return view('transaksi.create', [
            "title" => "Transaksi | Tambah Create",
            "header" => "Nota Penukaran Valuta Asing",
            "mata_uang"=>mata_uang::all()
        ]);
    }
    public function edit(transaksi $transaksi)
    {
        // dd($transaksi);
        return view('transaksi.edit', [
            "title" => "Transaksi | Edit ",
            "header" => "Edit Nota Penukaran Valuta Asing",
            "transaksi" => $transaksi,
            "mata_uang"=>mata_uang::all()
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "no_transaksi" => "required|unique:transaksi,no_transaksi",
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
        ],     [
            'no_transaksi.required' => "Nomor transaksi wajib diisi!",
            'no_transaksi.unique' => "Nomor transaksi sudah ada!",
            'tgl_transaksi.required' => "Tanggal transaksi wajib diisi!",
            'jenis_transaksi.required' => "Jenis transaksi wajib diisi!",
            'nama_nasabah.required' => "Nama nasabah wajib diisi!",
            'no_hp.required' => "No hp wajib diisi!",
            'jenis_id.required' => "Jenis id wajib diisi!",
            'no_id.required' => "No id wajib diisi!",
            'mata_uang.required' => "Mata uang wajib diisi!",
            'jumlah.required' => "Jumlah wajib diisi!",
            'rate.required' => "Rate wajib diisi!",
        ]);
        if ($validate) {
            $nasabah = nasabah::where('no_hp', $validate['no_hp'])->first();
            if (!$nasabah) {
                $nasabah = nasabah::create([
                    "nama_nasabah" => $validate['nama_nasabah'],
                    "jenis_id" => $validate['jenis_id'],
                    "no_id" => $validate['no_id'],
                    "no_hp" => $validate['no_hp'],
                ]);
            } else {
                if ($nasabah->nama_nasabah != $validate['nama_nasabah']) {
                    notify()->warning('No hp sudah terdaftar');
                    return back();
                }
                $nasabah->update([
                    "jenis_id" => $validate['jenis_id'],
                    "no_id" => $validate['no_id']
                ]);
            }
            $sub_total = $this->formatHarga($validate['jumlah_rp']);
            $jumlah = $this->formatHarga($validate['jumlah']);
            $rate = $this->formatHarga($validate['rate']);

            $transaksi = transaksi::create([
                "no_transaksi" => $validate['no_transaksi'],
                "tgl_transaksi" => $validate['tgl_transaksi'],
                "nasabah_id" => $nasabah->id,
                "jenis_transaksi" => $validate['jenis_transaksi'],
            ]);

            detail_transaksi::create([
                "no_transaksi" => $transaksi->no_transaksi,
                "mata_uang" => $validate['mata_uang'],
                "jumlah" => $jumlah,
                "rate" => $rate,
                "sub_total" => $sub_total
            ]);
            notify()->success('Data transaksi berhasil disimpan');
            return redirect()->route('transaksi.index');
        }
        notify()->error("Transaksi gagal disimpan");
        return back();
    }
    // public function delete($id)
    // {
    //     $transaksi = transaksi::where('id',$id)->first(); //select * from transaksi where id="1"
    //     $transaksi->delete();

    //     notify()->success('Data transaksi berhasil dihapus');
    //     return back();

    public function delete(transaksi $transaksi)
    {
        $transaksi->delete();

        notify()->success('Data transaksi berhasil dihapus');
        return back();
    }
    public function update(transaksi $transaksi, request $request)
    {
        $validate = $request->validate([
            "no_transaksi" => "required|unique:transaksi,no_transaksi,".$transaksi->id,
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
        ],     [
            'no_transaksi.required' => "Nomor transaksi wajib diisi!",
            'tgl_transaksi.required' => "Tanggal transaksi wajib diisi!",
            'jenis_transaksi.required' => "Jenis transaksi wajib diisi!",
            'nama_nasabah.required' => "Nama nasabah wajib diisi!",
            'no_hp.required' => "No hp wajib diisi!",
            'jenis_id.required' => "Jenis id wajib diisi!",
            'no_id.required' => "No id wajib diisi!",
            'mata_uang.required' => "Mata uang wajib diisi!",
            'jumlah.required' => "Jumlah wajib diisi!",
            'rate.required' => "Rate wajib diisi!",
        ]);
        $nasabah = nasabah::where("no_hp", $validate['no_hp'])->where("id", !$transaksi->nasabah->id)->first();
        if ($nasabah) {
            notify()->warning('Nomor telepon sudah terdaftar');
            return back();
        }
        $transaksi->nasabah->update([
            "nama_nasabah" => $validate["nama_nasabah"],
            "no_hp" => $validate["no_hp"],
            "jenis_id" => $validate["jenis_id"],
            "no_id" => $validate["no_id"]
        ]);

        $sub_total = $this->formatHarga($validate['jumlah_rp']);
        $jumlah = $this->formatHarga($validate['jumlah']);
        $rate = $this->formatHarga($validate['rate']);

        $transaksi->update([
            "no_transaksi" => $validate["no_transaksi"],
            "tgl_transaksi" => $validate["tgl_transaksi"],
            "jenis_transaksi" => $validate["jenis_transaksi"],
        ]);
        $transaksi->detail_transaksi->update([
            "mata_uang" => $validate["mata_uang"],
            "jumlah" => $jumlah,
            "rate" => $rate,
            "sub_total" => $sub_total
        ]);
        notify()->success("Berhasil mengubah data transaksi dengan nomor transaksi " . $transaksi->no_transaksi);
        return redirect()->route('transaksi.index');
    }

    public function formatHarga($value)
    {
        $formatHarga = str_replace('.', '', $value);
        return str_replace(',', '.', $formatHarga);
    }
}
