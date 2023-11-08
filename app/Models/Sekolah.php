<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $fillable = [
        'NAMA SEKOLAH','NPSN SEKOLAH', 'NAMA KEPALA SEKOLAH',
        'NOMOR HP KEPALA SEKOLAH', 'JENJANG SEKOLAH', 'KABUPATEN SEKOLAH',
        'PROVINSI SEKOLAH',
    ];
}
