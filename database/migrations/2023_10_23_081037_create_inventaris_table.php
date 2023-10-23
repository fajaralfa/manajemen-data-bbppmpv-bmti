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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->integer('No');
            $table->string('Nama Peralatan', 255);
            $table->string('Gambar');
            $table->string('Spesifikasi', 255);
            $table->string('Satuan', 255);
            $table->integer('Volume');
            $table->integer('Harga Satuan');
            $table->integer('Jumlah');
            $table->string('Keterangan Produk', 255);
            $table->string('Link Produk', 255);
            $table->string('Urgensi', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};