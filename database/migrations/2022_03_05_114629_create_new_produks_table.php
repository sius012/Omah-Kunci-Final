<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_produks', function (Blueprint $table) {
            $table->string('kode_produk',25)->primary();
            $table->string('nama_produk');
            $table->string('id_tipe');
            $table->string('id_ct');
            $table->string('id_merek');
            $table->integer('harga');
            $table->integer('diskon');
            $table->enum('diskon_tipe',['rupiah','persen']);
            $table->string('satuan');
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
        Schema::dropIfExists('new_produks');
    }
}
