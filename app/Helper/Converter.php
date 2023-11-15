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
        ];

        $date = trim($date);
        $input = explode(' ', $date);

        $tahun = $input[2];
        $bulan = $input[1];
        $tanggal = $input[0];

        // tambahkan angka nol di depan jika tanggal kurang dari 10
        if ((int) $tanggal < 10) $tanggal = '0' . $tanggal;
        $bulan = $bulanMap[strtolower($bulan)];

        // format = tahun-bulan-tanggal (contoh: 2005-08-04)
        $out = implode("-", [$tahun, $bulan, $tanggal]);

        return $out;
    }
}
