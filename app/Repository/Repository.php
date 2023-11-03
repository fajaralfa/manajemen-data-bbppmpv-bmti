<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

abstract class Repository
{
    protected string $table;

    public function save(array $input)
    {
        return DB::table($this->table)
            ->insert($input);
    }

    public function get(array $columns = ['*'])
    {
        return DB::table($this->table)
            ->get($columns);
    }

    public function findById(int $id, array $columns = ['*'])
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->first($columns);
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
