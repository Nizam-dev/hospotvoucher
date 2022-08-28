<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class profile_voucher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_voucher',
        'harga',
        'durasi',
    ];
 
    protected $dates = ['deleted_at'];

}
