<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class JoinRepository
{
    public function getDiklatSekolah(array $columns = ['*'])
    {
        return DB::table('diklat')
            ->join('sekolah', 'diklat.NPSN SEKOLAH', 'sekolah.NPSN SEKOLAH')
            ->get($columns);
    }

    public function filterByNamaTahun(?string $nama, ?string $tahun, array $columns = ['*'])
    {
        $result = DB::table('diklat')
            ->join('sekolah', 'diklat.NPSN SEKOLAH', 'sekolah.NPSN SEKOLAH');

        if (!empty($nama)) $result = $result->where('NAMA LENGKAP', 'LIKE', "%$nama%");
        if (!empty($tahun)) $result = $result->whereRaw('YEAR(`TANGGAL PERIODE AWAL`) = ?', $tahun);

        return $result->get($columns);
    }
}
