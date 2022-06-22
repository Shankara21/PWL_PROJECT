<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('kendaraan_id')->constrained();
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali')->nullable();
            $table->integer('lama_sewa');
            $table->integer('harga_sewa');
            $table->unsignedBigInteger('denda_id')->nullable();
            $table->integer('opsi')->nullable();
            $table->text('catatan')->nullable();
            $table->foreign('denda_id')->references('id')->on('dendas');
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
        Schema::dropIfExists('order_details');
    }
};
