<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_gudang',
        'nama_gudang'
    ];

    protected $hidden = [
        'id'
    ];

    public function barang()
    {
        return $this->hasMany(Product::class);
    }

    public function merek()
    {
        return $this->hasMany(Brand::class);
    }

    public function tipe()
    {
        return $this->hasMany(Type::class);
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
