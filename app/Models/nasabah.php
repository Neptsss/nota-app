<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class nasabah extends Model
{
    use HasFactory;
    protected $table = 'nasabah';
    protected $guarded = ['id'];

    public function transaksi(): HasMany
    {
        return $this->hasMany(transaksi::class);
    }

    public function scopeFilterNasabah($query, array $filter)
    {
        $query->when($filter['nama_nasabah'] ?? false, function ($query, $nama_nasabah) {
            return $query->where('nama_nasabah', 'LIKE', "%{$nama_nasabah}%");
        });

        $query->when($filter['no_hp'] ?? false, function ($query, $no_hp) {
            return $query->where('no_hp', 'LIKE', "%{$no_hp}%");
        });

        $query->when($filter['no_id'] ?? false, function ($query, $no_id) {
            return $query->where('no_id', 'LIKE', "%{$no_id}%");
        });

        $query->when($filter['jenis_id'] ?? false, function ($query, $jenis_id) {
            return $query->where('jenis_id', $jenis_id);
        });
    }

    public static function boot(){
        parent::boot();
        static::creating(function($model){
            if(empty($model->kode_nasabah)){
                $model->kode_nasabah = "NSB-".strtoupper(Str::random(5));
            }
        });
    }

    public function getRouteKeyName(){
        return "kode_nasabah";
    }
}
