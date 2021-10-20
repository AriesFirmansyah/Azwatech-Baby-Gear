<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama_barang');
            $table->integer('harga');
            $table->longText('deskripsi');
            $table->string('gambar');
            $table->integer('stok');
            $table->string('kategori');
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
            // $table->foreignId('user_id');
            // $table->foreignId('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
