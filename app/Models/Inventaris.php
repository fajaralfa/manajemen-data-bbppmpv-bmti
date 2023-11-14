<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $fillable = [
        'Kategori',
        'Nama Peralatan',
        'Gambar',
        'Merk',
        'Tipe',
        'Spesifikasi',
        'Nomor Seri',
        'Satuan',
        'Volume',
        'Harga Satuan',
        'Jumlah',
        'Keterangan Produk',
        'Link Produk',
        'Urgensi',
        'Waktu Pengadaan',
        'Waktu Inventory',
        'Kondisi',
        'Keterangan',
    ];
}
