<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prakerin extends Model
{
    use HasFactory;
    protected $table = 'prakerin';
    protected $fillable = [
        'NAMA_LENGKAP', 'NAMA_SEKOLAH', 'NIS/NIM', 'BIDANG_KEAHLIAN',
        'PROGRAM_KEAHLIAN', 'KOMPETENSI_KEAHLIAN', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'JENIS_KELAMIN',
        'AGAMA', 'ALAMAT_LENGKAP', 'NO_HP', 'EMAIL', 'FOTO',
        'HOBBY', 'TANGGAL_MASUK', 'TANGGAL_KELUAR', 'TEMPAT/DEPARTEMEN_PELAKSANAAN', 'NAMA_SEKOLAH',
        'KABUPATEN/KOTA_SEKOLAH', 'STATUS_SEKOLAH', 'NSS', 'ALAMAT_LENGKAP_SEKOLAH', 'POSEL_SEKOLAH',
    ];
}
