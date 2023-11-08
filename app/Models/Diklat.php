<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    use HasFactory;
    protected $table = 'diklat';
    protected $fillable = [
        'NAMA LENGKAP',
        'KOMPETENSI KEAHLIAN',
        'PROGRAM KEAHLIAN',
        'BIDANG KEAHLIAN',
        'NIK',
        'NUPTK',
        'NIP',
        'NO UKG',
        'TEMPAT LAHIR',
        'TANGGAL LAHIR',
        'USIA',
        'KELAMIN',
        'JABATAN',
        'GOLONGAN',
        'NOMOR HP',
        'EMAIL',
        'MAPEL AJAR',
        'KELAS AJAR',
        'NPSN SEKOLAH',
        'KELAS',
        'NAMA DIKLAT',
        'TANGGAL PERIODE AWAL',
        'TANGGAL PERIODE AKHIR',
        'TEMPAT DIKLAT',
        'RIWAYAT DIKLAT',
        'FOTO',
        'KETERANGAN',
    ];
}
