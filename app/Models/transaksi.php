<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

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

    public function detail_transaksi(): HasOne
    {
        return $this->hasOne(detail_transaksi::class, 'transaksi_id', 'id');
    }

    /*
     ? scopeFilters
     * Method atau function yang bertujuan untuk mencari atau memfilter data yang dicari

     ? PARAMETER
     * $query : merupakan instance atau objek dari class Builder milik laravel yang berfungsi untuk menangani query atau perintah SQL ( SELECT no_transaksi WHERE no_transaksi = ....)
     * array $filter : merupakan variabel yang digunakan untuk menangkap data yang di cari, bertipe array karena data yang dicari lebih dari 1

     ? Penggunaan
     * Untuk penggunaan method ini diterapkan pada controller, contohnya pada transaksiController.
     * Pemanggilannya tidak persis nama methodnya cukup gunakan kalimat setelah 'scope', contohnya pada method atau function ini bernama 'scopeFilters' maka ketika dipanggil cukup tuliskan 'Filters'
     * Hal ini dikarenakan laravel
     */

    public function scopeFilters($query, array $filter)
    {
        /*
         ? when()
         * query apakah ada filter dengan kunci no_transaksi ? jika tidak (false) maka abaikan, namun jika ada program akan menjalankan function.
        */
        $query->when($filter['no_transaksi'] ?? false, function ($query, $no_transaksi) {

            // * jika filter dengan kunci array no_transaksi ditemukan maka program akan masuk ke statement ini

            // * query tolong carikan no_transaksi yang memiliki ....

            // * contoh : user mencari no_transaksi : abcd -> query tolong carikan no_transaksi yang memiliki karakter atau huruf abcd ( karena menggunakan like & ( % ) depan belakang)

            // * return : mengembalikan nilai yang ditemukan
            return $query->where('no_transaksi', 'LIKE', "%{$no_transaksi}%");
        });

        // * karena tidak menggunakan % maka data yang dicari dan data yang ada harus sama persis
        // * contohya jika mencari tanggal 10 (tidak menyertakan bulan) dan di database terdapat data 10 Desember maka data 10 Desember ini tidak akan tampil karena tidak cocok dengan data yang dicari. ( 10 != 10 Desember)

        $query->when($filter['tgl_transaksi'] ?? false, function ($query, $tgl_transaksi) {
            return $query->where('tgl_transaksi', $tgl_transaksi);
        });

        $query->when($filter['jenis_transaksi'] ?? false, function ($query, $jenis_transaksi) {
            return $query->where('jenis_transaksi', $jenis_transaksi);
        });

        $query->when($filter['nama_nasabah'] ?? false, function ($query, $nama_nasabah) {

            /*
             ? whereHas()
             * digunakan ketika ingin mencari data dari tabel lain yang memiliki relasi
             * Dalam model transaksi ini karena memiliki relasi dengan nasabah maka program dapat membaca data dari tabel nasabah juga menggunakan whereHas ini.

             ? use ($nama_nasabah)
             * kode ini berarti mengambil variabel $nama_nasabah di parameter sebelumnya
             */

            return $query->whereHas('nasabah', function ($query) use ($nama_nasabah) {
                $query->where('nama_nasabah', 'LIKE', "%{$nama_nasabah}%");
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

    static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->token)) {
                $model->token = Str::random(10);
            }
        });
    }
}
