<?php
namespace App\Helper;

class Converter
{
    public function formatDate(string $date)
    {
        $bulanMap = [
            'januari' => '01',
            'februari' => '02',
            'maret' => '03',
            'april' => '04',
            'mei' => '05',
            'juni' => '06',
            'juli' => '07',
            'agustus' => '08',
            'september' => '09',
            'oktober' => '10',
            'november' => '11',
            'desember' => '12',

            'january' => '01',
            'february' => '02',
            'march' => '03',
            'april' => '04',
            'may' => '05',
            'june' => '06',
            'july' => '07',
            'august' => '08',
            'september' => '09',
            'october' => '10',
            'november' => '11',
            'desember' => '12',
        ];

        $input = explode(' ', $date);

        $date = $input[0];
        $month = $bulanMap[strtolower($input[1])];
        $year = $input[2];

        $output = implode("-", [$year, $month, $date]);
        
        return $output;
    }
}