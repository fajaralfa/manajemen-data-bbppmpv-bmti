<?php

namespace App\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class SpreadsheetFacade
{
    public function __construct(
        protected Xlsx $xlsx,
    ) {
    }

    /**
     * convert excel spreadsheet to associative array
     */
    public function excelToCollectionAssoc(string $filePath): Collection
    {
        $filePath = Storage::path($filePath);

        $matrix = $this->xlsx->load($filePath)->getSheet(0)->toArray();
        $data = collect($matrix);

        $columnName = collect($matrix[0])->map(fn ($item) => trim($item));
        $allData = $data->splice(1);

        $result = $allData->mapWithKeys(function ($item, $key) use ($columnName) {
            $item = $columnName->combine($item);
            unset($item['']);

            return [$key => $item];
        });

        return $result;
    }
}
