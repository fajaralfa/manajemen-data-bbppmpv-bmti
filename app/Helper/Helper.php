<?php

namespace App\Helper;

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

    public function mapTableToRequest(array $input)
    {
        $new = [];
        foreach($input as $key => $val)
        {
            $key = str_replace(' ', '_', $key);
            $new[$key] = $val;
        }

        return $new;
    }
}