<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LoginStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode_gudang',
        'kode_barang',
        'kode_merek',
        'kode_tipe',
        'stock_masuk',
        'stock_awal',
        'kode_satuan'
    ];

    protected $hidden = [
        'id'
    ];

    public function gudang()
    {
        return $this->belongsTo(Warehouse::class,'kode_gudang');
    }

    public function merek()
    {
        return $this->belongsTo(Brand::class,'kode_merek');
    }

    public function tipe()
    {
        return $this->belongsTo(Type::class,'kode_tipe');
    }

    public function barang()
    {
        return $this->belongsTo(Product::class,'kode_barang');
    }

    public function satuan()
    {
        return $this->belongsTo(Unit::class,'kode_satuan');
    }
}
