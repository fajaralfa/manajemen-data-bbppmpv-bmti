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
        Schema::create('diklat', function (Blueprint $table) {
            $table->id();
            $table->string('NIK', 20)->unique();
            $table->string('NUPTK', 20)->nullable();
            $table->string('NIP', 20)->nullable();
            $table->string('NO UKG', 20)->nullable();
            $table->string('NAMA LENGKAP', 255);
            $table->string('TEMPAT LAHIR', 255);
            $table->date('TANGGAL LAHIR')->nullable();
            $table->integer('USIA');
            $table->enum('KELAMIN', ['L', 'P']);
            $table->string('JABATAN', 50);
            $table->string('GOLONGAN', 20);
            $table->string('NOMOR HP', 20);
            $table->string('EMAIL', 255);
            $table->string('KOMPETENSI KEAHLIAN', 50);
            $table->string('PROGRAM KEAHLIAN', 50);
            $table->string('BIDANG KEAHLIAN', 50);
            $table->string('MAPEL AJAR', 100)->nullable();
            $table->string('KELAS AJAR', 50);
            $table->string('NPSN SEKOLAH', 20)->nullable();
            $table->string('KELAS', 20);
            $table->string('NAMA DIKLAT', 50);
            $table->date('TANGGAL PERIODE AWAL');
            $table->date('TANGGAL PERIODE AKHIR');
            $table->string('TEMPAT DIKLAT', 50);
            $table->string('RIWAYAT DIKLAT', 50);
            $table->string('FOTO', 255)->nullable(true);
            $table->string('KETERANGAN', 255)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diklat');
    }
};
