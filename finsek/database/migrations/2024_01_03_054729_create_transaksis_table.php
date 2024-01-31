<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('kode_produk');
            $table->integer('banyak');
            $table->integer('bayar');
            $table->unsignedBigInteger('kode_pembeli');
            $table->string('status');

            $table->foreign('kode_produk')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('kode_pembeli')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
