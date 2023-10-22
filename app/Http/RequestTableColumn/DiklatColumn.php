<?php

namespace App\Http\RequestTableColumn;

class DiklatColumn
{
    public function mapToTable(array $reqInput)
    {
        return [
            'NAMA LENGKAP' => $reqInput['NAMA_LENGKAP'],
            'KOMPETENSI KEAHLIAN' => $reqInput['KOMPETENSI_KEAHLIAN'],
            'PROGRAM KEAHLIAN' => $reqInput['PROGRAM_KEAHLIAN'],
            'BIDANG KEAHLIAN' => $reqInput['BIDANG_KEAHLIAN'],
            'ID' => $reqInput['ID'],
            'NIK' => $reqInput['NIK'],
            'NUPTK' => $reqInput['NUPTK'],
            'NIP' => $reqInput['NIP'],
            'NO UKG' => $reqInput['NO_UKG'],
            'TEMPAT LAHIR' => $reqInput['TEMPAT_LAHIR'],
            'TANGGAL LAHIR' => $reqInput['TANGGAL_LAHIR'],
            'USIA' => $reqInput['USIA'],
            'KELAMIN' => $reqInput['JENIS_KELAMIN'],
            'JABATAN' => $reqInput['JABATAN'],
            'GOLONGAN' => $reqInput['GOLONGAN'],
            'NOMOR HP' => $reqInput['NOMOR_HP'],
            'EMAIL' => $reqInput['EMAIL'],
            'MAPEL AJAR' => $reqInput['MAPEL_AJAR'],
            'KELAS AJAR' => $reqInput['KELAS_AJAR'],
            'KELAS' => $reqInput['KELAS'],
            'NAMA DIKLAT' => $reqInput['NAMA_DIKLAT'],
            'TANGGAL PERIODE AWAL' => $reqInput['TANGGAL_PERIODE_AWAL'],
            'TANGGAL PERIODE AKHIR' => $reqInput['TANGGAL_PERIODE_AKHIR'],
            'TEMPAT DIKLAT' => $reqInput['TEMPAT_DIKLAT'],
            'RIWAYAT DIKLAT' => $reqInput['RIWAYAT_DIKLAT'],
            'FOTO' => $reqInput['FOTO'],
            'KETERANGAN' => $reqInput['KETERANGAN'],
        ];
    }
}
