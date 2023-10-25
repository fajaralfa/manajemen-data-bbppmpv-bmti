<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class DiklatRepository
{
    private string $table = 'diklat';

    public function save(array $input)
    {
        return DB::table($this->table)
            ->insert($input);
    }

    public function findById(int $id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->first();
    }

    public function deleteById(int $id)
    {
        return DB::table($this->table)
            ->delete($id);
    }

    public function update(int $id, array $input)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update($input);
    }
}
