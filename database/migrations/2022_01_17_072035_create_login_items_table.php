<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_items', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah');
            $table->string('nama_barang');
            $table->unsignedBigInteger('kode_barang')->nullable();
            $table->foreign('kode_barang')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('kode_satuan')->nullable();
            $table->foreign('kode_satuan')->references('id')->on('units')->onDelete('cascade');
            $table->unsignedBigInteger('kode_gudang')->nullable();
            $table->foreign('kode_gudang')->references('id')->on('warehouses')->onDelete('cascade');
            $table->unsignedBigInteger('kode_merek')->nullable();
            $table->foreign('kode_merek')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('kode_tipe')->nullable();
            $table->foreign('kode_tipe')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('kode_user')->nullable();
            $table->foreign('kode_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('login_items');
    }
}
