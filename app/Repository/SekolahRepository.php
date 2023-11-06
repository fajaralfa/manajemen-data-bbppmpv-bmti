<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class SekolahRepository extends Repository
{
    protected string $table = 'sekolah';

    public function getNamaDanNPSN()
    {
        return $this->get(['NAMA SEKOLAH', 'NPSN SEKOLAH']);
    }
}
