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
        Schema::create('pengembalianDetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengembalian_id')->nullable();
            $table->foreign('pengembalian_id')->references('id')->on('pengembalians');
            $table->date('tanggal_kembali')->nullable();
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
        Schema::dropIfExists('pengembalianDetails');
    }
};
