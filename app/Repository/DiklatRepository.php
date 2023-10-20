<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class DiklatRepository
{
    private string $table = 'peserta_diklat';

    public function save(array $input)
    {
        return DB::table($this->table)
            ->insert($input);
    }
}
