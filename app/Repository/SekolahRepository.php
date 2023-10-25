<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class SekolahRepository
{
    private $table = 'sekolah';
    public function get()
    {
        return DB::table($this->table)
            ->get();
    }
}
