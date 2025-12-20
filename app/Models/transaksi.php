<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $guarded = ['id'];
    protected $with = ['nasabah', 'detail_transaksi'];

    public function nasabah(): BelongsTo
    {
        return $this->belongsTo(nasabah::class);
    }

    public function detail_transaksi(): BelongsTo
    {
        return $this->belongsTo(detail_transaksi::class, "no_transaksi", "no_transaksi");
    }


    public function scopeFilters($query, array $filter)
    {

        $query->when($filter['no_transaksi'] ?? false, function ($query, $no_transaksi) {
            return $query->where('no_transaksi', $no_transaksi);
        });

        $query->when($filter['tgl_transaksi'] ?? false, function ($query, $tgl_transaksi) {
            return $query->where('tgl_transaksi', $tgl_transaksi);
        });

        $query->when($filter['jenis_transaksi'] ?? false, function ($query, $jenis_transaksi) {
            return $query->where('jenis_transaksi', $jenis_transaksi);
        });

        $query->when($filter['nama_nasabah'] ?? false, function ($query, $nama_nasabah) {
            return $query->whereHas('nasabah', function ($query) use ($nama_nasabah) {
                $query->where('nama_nasabah', $nama_nasabah);
            });
        });

        $query->when($filter['jenis_id'] ?? false, function ($query, $jenis_id) {
            return $query->whereHas('nasabah', function ($query) use ($jenis_id) {
                $query->where('jenis_id', $jenis_id);
            });
        });

        $query->when($filter['mata_uang'] ?? false, function ($query, $mata_uang) {
            return $query->whereHas('detail_transaksi', function ($query) use ($mata_uang) {
                $query->where('mata_uang', $mata_uang);
            });
        });
    }
}
