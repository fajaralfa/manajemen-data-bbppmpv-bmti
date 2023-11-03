<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class DiklatRepository extends Repository
{
    protected string $table = 'diklat';

    public function getPhotoPath(int $id)
    {
        return $this->findById($id)?->FOTO;
    }

    public function countByYear(int $year)
    {
        return DB::table($this->table)
            ->whereRaw('YEAR(`TANGGAL PERIODE AWAL`) = ?', [$year])
            ->count();
    }
}
