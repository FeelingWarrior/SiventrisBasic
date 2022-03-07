<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_barang',
        'kode_user',
        'jumlah',
        'stok',
        'catatan'
    ];

    protected $hidden = [
        'id'
    ];
}
