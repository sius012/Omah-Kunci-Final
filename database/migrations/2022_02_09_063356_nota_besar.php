<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NotaBesar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_besar', function (Blueprint $table) {
            $table->id('id');
            $table->integer('id_transaksi');
            $table->string('ttd');
            $table->string('up');
            $table->string('us');
            $table->string('brp');
            $table->string('gm');
            $table->integer('total');
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
        //
    }
}
