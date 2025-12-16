<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class nasabah extends Model
{
    use HasFactory;
    protected $table = 'nasabah';
    protected $guarded = ['id'];
    // protected $with = ['transaksi'];

    public function transaksi () : HasMany {
        return $this->hasMany(transaksi::class);
    }

}
