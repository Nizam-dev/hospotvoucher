<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_voucher',
        'harga',
        'durasi',
        'kode',
        'status'
    ];
}
