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

    public function mapToRequest(array $dbInput)
    {
        return [
            'NAMA_LENGKAP' => $dbInput['NAMA LENGKAP'],
            'KOMPETENSI_KEAHLIAN' => $dbInput['KOMPETENSI KEAHLIAN'],
            'PROGRAM_KEAHLIAN' => $dbInput['PROGRAM KEAHLIAN'],
            'BIDANG_KEAHLIAN' => $dbInput['BIDANG KEAHLIAN'],
            'NIK' => $dbInput['NIK'],
            'NUPTK' => $dbInput['NUPTK'],
            'NIP' => $dbInput['NIP'],
            'NO_UKG' => $dbInput['NO UKG'],
            'TEMPAT_LAHIR' => $dbInput['TEMPAT LAHIR'],
            'TANGGAL_LAHIR' => $dbInput['TANGGAL LAHIR'],
            'USIA' => $dbInput['USIA'],
            'JENIS_KELAMIN' => $dbInput['KELAMIN'],
            'JABATAN' => $dbInput['JABATAN'],
            'GOLONGAN' => $dbInput['GOLONGAN'],
            'NOMOR_HP' => $dbInput['NOMOR HP'],
            'EMAIL' => $dbInput['EMAIL'],
            'MAPEL_AJAR' => $dbInput['MAPEL AJAR'],
            'KELAS_AJAR' => $dbInput['KELAS AJAR'],
            'KELAS' => $dbInput['KELAS'],
            'NAMA_DIKLAT' => $dbInput['NAMA DIKLAT'],
            'TANGGAL_PERIODE_AWAL' => $dbInput['TANGGAL PERIODE AWAL'],
            'TANGGAL_PERIODE_AKHIR' => $dbInput['TANGGAL PERIODE AKHIR'],
            'TEMPAT_DIKLAT' => $dbInput['TEMPAT DIKLAT'],
            'RIWAYAT_DIKLAT' => $dbInput['RIWAYAT DIKLAT'],
            'FOTO' => $dbInput['FOTO'],
            'KETERANGAN' => $dbInput['KETERANGAN'],
        ];
    }
}
