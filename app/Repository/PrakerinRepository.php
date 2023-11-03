<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class PrakerinRepository extends Repository
{
    protected string $table = 'prakerin';

    public function filterNamaNisTahun(?string $nama, ?string $nis, ?string $tahun, array $columns = ['*'])
    {
        $result = DB::table($this->table);

        if (!empty($nama)) $result = $result->where('NAMA LENGKAP', 'LIKE', "%$nama%");
        if (!empty($nis)) $result = $result->where('NIS/NIM', $nis);
        if (!empty($tahun)) $result = $result->whereRaw('YEAR(`TANGGAL MASUK`) = ?', [$tahun]);

        return $result->get($columns);
    }

    public function countByYear(int $year)
    {
        return DB::table($this->table)
            ->whereRaw('YEAR(`TANGGAL MASUK`) = ?', [$year])
            ->count();
    }
}
