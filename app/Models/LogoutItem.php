<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LogoutItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_barang',
        'kode_gudang',
        'kode_merek',
        'kode_tipe',
        'kode_barang',
        'jumlah',
        'kode_satuan'
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

    public function user()
    {
        return $this->belongsTo(User::class,'kode_user');
    }
}
