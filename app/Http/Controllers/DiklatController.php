<?php

namespace App\Http\Controllers;

use App\Repository\DiklatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiklatController extends Controller
{
    public function __construct(
        private DiklatRepository $diklatRepository
    )
    {
        
    }
    public function view()
    {
        $data = DB::table('peserta_diklat')->get();
        return inertia('Diklat/View', ['data' => $data]);
    }

    // belum beres
    public function store()
    {
        $input = request()->validate([
            'NAMA LENGKAP' => ['required'],
            'KOMPETENSI KEAHLIAN' => ['required'],
            'PROGRAM KEAHLIAN' => ['required'],
            'BIDANG KEAHLIAN' => ['required'],
            'ID' => ['required'],
            'NIK' => ['required'],
            'NUPTK' => ['required'],
            'NIP' => ['required'],
            'NO UKG' => ['required'],
            'TEMPAT LAHIR' => ['required'],
            'TANGGAL LAHIR' => ['required'],
            'USIA' => ['required'],
            'JENIS KELAMIN' => ['required'],
            'JABATAN' => ['required'],
            'GOLONGAN' => ['required'],
            'NOMOR HP' => ['required'],
            'EMAIL' => ['required'],
            'MAPEL AJAR' => ['required'],
            'KELAS AJAR' => ['required'],
            'KELAS' => ['required'],
            'NAMA DIKLAT' => ['required'],
            'TANGGAL PERIODE AWAL' => ['required'],
            'TANGGAL PERIODE AKHIR' => ['required'],
            'TEMPAT DIKLAT' => ['required'],
            'RIWAYAT DIKLAT' => ['required'],
            'KETERANGAN' => ['required'],
        ]);

        $photoPath = request()->file('FOTO')[0]->store('pasfoto-diklat');
        $input['FOTO'] = $photoPath;

        $this->diklatRepository->save($input);

        return inertia('Diklat/View', [
            'message'=>'Data Tersimpan!!!!'
        ]);

    }
}
