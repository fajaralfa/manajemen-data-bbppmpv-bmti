<?php

namespace App\Repository;

use App\Models\Prakerin;
use Illuminate\Database\Eloquent\Collection;

class PrakerinRepository
{
    public function save(array $input)
    {
        return Prakerin::create($input);
    }
    
    public function filterNamaNisTahun(?string $nama, ?string $nis, ?string $tahun, array $columns = ['*']): Collection
    {
        $model = new Prakerin();
        if ($nama)
            $model = $model->where('NAMA LENGKAP', 'LIKE', "%$nama%");
        if ($nis)
            $model = $model->where('NIS/NIM', $nis);
        if ($tahun)
            $model = $model->whereRaw('YEAR(`TANGGAL MASUK`) = ?', [$tahun]);

        $data = $model->get();
        return $data;
    }

    public function countByYear(int $year): int
    {
        $model = new Prakerin();
        return $model->whereRaw('YEAR(`TANGGAL MASUK`) = ?', [$year])
            ->count();
    }
}
