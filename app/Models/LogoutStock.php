<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LogoutStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kode_gudang',
        'kode_merek',
        'kode_tipe',
        'stock_keluar',
        'kode_satuan',
    ];

    protected $hidden = [
        'id'
    ];

    public function barang()
    {
        return $this->belongsTo(Product::class,'kode_barang');
    }

    public function satuan()
    {
        return $this->belongsTo(Unit::class,'kode_satuan');
    }
}
