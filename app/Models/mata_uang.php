<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mata_uang extends Model
{
    use HasFactory;
    protected $table = "mata_uang";
    protected $guarded = ['id'];
}
