<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    private string $table = 'users';

    public function save(array $input)
    {
        return DB::table($this->table)
            ->insert($input);
    }
}
