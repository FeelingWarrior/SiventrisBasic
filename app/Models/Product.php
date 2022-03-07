<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_gudang',
        'kode_merek',
        'kode_tipe',
        'kode_barang',
        'tipe_barang'
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

    public function item_masuk()
    {
        return $this->hasMany(LoginItem::class);
    }

    public function stock_masuk()
    {
        return $this->hasMany(LoginStock::class);
    }

    public function item_keluar()
    {
        return $this->hasMany(LogoutItem::class);
    }

    public function stock_keluar()
    {
        return $this->hasMany(LogoutStock::class);
    }
}
