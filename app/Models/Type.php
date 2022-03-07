<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_tipe',
        'nama_tipe'
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

    public function barang()
    {
        return $this->hasMany(Product::class);
    }

    public function item_masuk()
    {
        return $this->hasMany(LoginItem::class);
    }

    public function stock_masuk()
    {
        return $this->hasMany(LoginStock::class);
    }
}
