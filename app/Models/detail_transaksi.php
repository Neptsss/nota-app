<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class detail_transaksi extends Model
{
    use HasFactory;
    protected $table = "detail_transaksi";
    protected $guarded = ['id'];
    protected $with = ['transaksi', 'mata_uang'];

    public function mata_uang():BelongsTo {
        return $this->belongsTo(mata_uang::class, "id_mata_uang");

    }

    public function transaksi():BelongsTo {
        return $this->belongsTo(transaksi::class, "no_transaksi");
    }

    public function getRouteKeyName()
    {
        return "no_transaksi";
    }
}
