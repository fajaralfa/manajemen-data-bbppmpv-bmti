<?php

namespace App\Http\RequestTableColumn;

class SekolahColumn
{
    public function mapToTable(array $input)
    {
        $new = [];
        foreach($input as $key => $val)
        {
            $key = str_replace('_', ' ', $key);
            $new[$key] = $val;
        }

        return $new;
    }
}