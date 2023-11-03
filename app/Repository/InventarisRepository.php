<?php

namespace App\Repository;

use App\Helper\Helper;
use Illuminate\Support\Facades\DB;

class InventarisRepository extends Repository
{
    protected string $table = 'inventaris';

    public function getPhotoNameById(int $id): ?string
    {
        return $this->findById($id, ['Gambar'])->Gambar;
    }

    public function getByFilters(array $filters, array $columns = ['*'])
    {
        //jika nilai filter kosong, jangan di masukan.
        //jangan masukan waktu pengadaan secara langsung.
        $result = DB::table($this->table);
        if (isset($filters['Waktu Pengadaan']) && $filters['Waktu Pengadaan'] != null) {
            $result = $result->whereRaw('YEAR(`Waktu Pengadaan`) = ?', $filters['Waktu Pengadaan']);
            unset($filters['Waktu Pengadaan']);
        }

        $filters = collect($filters)->filter(function ($item, $key) {
            return $item != null;
        })->all();

        foreach ($filters as $key => $val) {
            $result = $result->where($key, $val);
        }

        return $result->get($columns);
    }
    public function countByYear(int $year)
    {
        return DB::table($this->table)
            ->whereRaw('YEAR(`WAKTU PENGADAAN`) = ?', [$year])
            ->count();
    }
}
