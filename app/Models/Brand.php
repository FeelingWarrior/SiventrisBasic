<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_merek',
        'nama_merek',
    ];

    protected $hidden = [
        'id'
    ];

    public function gudang()
    {
        return $this->belongsTo(Warehouse::class,'kode_gudang');
    }

    public function tipe_barang()
    {
        return $this->hasMany(Type::class);
    }

    public function barang()
    {
        return $this->hasMany(Product::class);
    }

    public function item_masuk()
    {
        return $this->hasMany(LoginStock::class);
    }

    public function stock_masuk()
    {
        return $this->hasMany(LoginStock::class);
    }
}
