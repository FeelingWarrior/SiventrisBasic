<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('tipe_barang');
            $table->unsignedBigInteger('kode_gudang')->nullable();
            $table->foreign('kode_gudang')->references('id')->on('warehouses')->onDelete('cascade');
            $table->unsignedBigInteger('kode_merek')->nullable();
            $table->foreign('kode_merek')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('kode_tipe')->nullable();
            $table->foreign('kode_tipe')->references('id')->on('types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
