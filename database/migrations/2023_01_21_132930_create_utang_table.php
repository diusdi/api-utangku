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
        Schema::create('utang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_teman');
            $table->integer('nominal');
            $table->string('alasan');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_lunas');
            $table->enum('keterangan_lunas', ['lunas', 'belum']);
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
        Schema::dropIfExists('utang');
    }
};
