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
}
