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
        Schema::create('prakerin', function (Blueprint $table) {
            $table->id();
            $table->string('NAMA LENGKAP', 255);
            $table->string('NAMA SEKOLAH', 100);
            $table->string('NIS/NIM', 50)->unique();
            $table->string('BIDANG KEAHLIAN', 100);
            $table->string('PROGRAM KEAHLIAN', 100);
            $table->string('TEMPAT LAHIR', 100);
            $table->string('TANGGAL LAHIR', 50);
            $table->enum('JENIS KELAMIN', ['L', 'P']);
            $table->string('AGAMA', 50);
            $table->string('ALAMAT LENGKAP', 255);
            $table->string('NO HP', 20);
            $table->string('EMAIL', 50);
            $table->string('FOTO', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prakerin');
    }
};
