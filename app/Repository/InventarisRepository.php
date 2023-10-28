<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class InventarisRepository extends Repository
{
    protected string $table = 'inventaris';

    public function getPhotoNameById(int $id): ?string
    {
        return $this->findById($id, ['Gambar'])->Gambar;
    }
}
