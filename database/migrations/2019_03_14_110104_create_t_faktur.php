<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTFaktur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_faktur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang', 150);
            $table->integer('harga', false, true)->length(20);
            $table->integer('qty', false, true)->length(20);
            $table->integer('total', false, true)->length(20);
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
        Schema::dropIfExists('t_faktur');
    }
}
