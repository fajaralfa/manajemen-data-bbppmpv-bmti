<?php

namespace App\Models;

use Database\Factories\PrakerinFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Prakerin extends Model
{
    use HasFactory;
    protected $table = 'prakerin';
    protected $fillable = [
        'NAMA LENGKAP', 'NAMA SEKOLAH', 'NIS/NIM', 'BIDANG KEAHLIAN',
        'PROGRAM KEAHLIAN', 'KOMPETENSI KEAHLIAN', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'JENIS KELAMIN',
        'AGAMA', 'ALAMAT LENGKAP', 'NO HP', 'EMAIL', 'FOTO',
        'HOBBY', 'TANGGAL MASUK', 'TANGGAL KELUAR', 'TEMPAT/DEPARTEMEN PELAKSANAAN', 'NAMA SEKOLAH',
        'KABUPATEN/KOTA SEKOLAH', 'STATUS SEKOLAH', 'NSS', 'ALAMAT LENGKAP SEKOLAH', 'POSEL SEKOLAH',
    ];

    protected static function newFactory(): Factory
    {
        return PrakerinFactory::new();
    }
}
