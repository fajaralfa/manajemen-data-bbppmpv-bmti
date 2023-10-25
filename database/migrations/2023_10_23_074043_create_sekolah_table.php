<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('NAMA SEKOLAH', 255);
            $table->string('NPSN SEKOLAH', 100)->unique()->nullable();
            $table->string('NAMA KEPALA SEKOLAH', 100)->nullable();
            $table->string('NOMOR HP KEPALA SEKOLAH', 100)->nullable();
            $table->string('JENJANG SEKOLAH', 20);
            $table->string('KABUPATEN SEKOLAH', 100);
            $table->string('PROVINSI SEKOLAH', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
