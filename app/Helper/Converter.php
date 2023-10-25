<?php
namespace App\Helper;

class Converter
{
    public function formatDate(string $date)
    {
        $bulanMap = [
            'Januari' => '01',
            'Februari' => '02',
            'Maret' => '03',
            'April' => '04',
            'Mei' => '05',
            'Juni' => '06',
            'Juli' => '07',
            'Agustus' => '08',
            'September' => '09',
            'Oktober' => '10',
            'November' => '11',
            'Desember' => '12',
        ];

        $input = explode(' ', $date);
        if((int) $input[0] < 10) $input[0] = '0' . $input[0];

        $out = implode("-", [$input[2], $bulanMap[$input[1]], $input[0]]);
        
        return $out;
    }
}