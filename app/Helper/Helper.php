<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;

class Helper
{
    public function mapRequestToTable(array $input)
    {
        $new = [];
        foreach($input as $key => $val)
        {
            $key = str_replace('_', ' ', $key);
            $new[$key] = $val;
        }

        return $new;
    }

    public function mapTableToRequest(array|Model $input)
    {
        if ($input instanceof Model)
            $input = $input->toArray();
        
        $new = [];
        foreach($input as $key => $val)
        {
            $key = str_replace(' ', '_', $key);
            $new[$key] = $val;
        }

        return $new;
    }
}