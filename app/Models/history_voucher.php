<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_voucher',
        'user_id',
        'voucher_id',
    ];
}
