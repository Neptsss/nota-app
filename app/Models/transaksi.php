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

    public function nasabah() : BelongsTo {
        return $this->belongsTo(nasabah::class);
    }

    public function detail_transaksi() : BelongsTo {
        return $this->belongsTo(detail_transaksi::class, "no_transaksi","no_transaksi");
    }
}
