<?php

namespace App\Http\Controllers;

use App\Http\RequestTableColumn\DiklatColumn;
use App\Repository\DiklatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiklatController extends Controller
{
    public function __construct(
        private DiklatRepository $diklatRepository,
        private DiklatColumn $diklatColumn,
    ) {
    }
    public function view()
    {
        $data = DB::table('peserta_diklat')->get();
        return inertia('Diklat/View', ['data' => $data]);
    }

    public function store()
    {
        // request field jangan pakai spasi
        $input = request()->validate([
            'NAMA_LENGKAP' => ['required'],
            'KOMPETENSI_KEAHLIAN' => ['required'],
            'PROGRAM_KEAHLIAN' => ['required'],
            'BIDANG_KEAHLIAN' => ['required'],
            'ID' => ['required'],
            'NIK' => ['required'],
            'NUPTK' => ['required'],
            'NIP' => ['required'],
            'NO_UKG' => ['required'],
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required'],
            'USIA' => ['required'],
            'JENIS_KELAMIN' => ['required'],
            'JABATAN' => ['required'],
            'GOLONGAN' => ['required'],
            'NOMOR_HP' => ['required'],
            'EMAIL' => ['required'],
            'MAPEL_AJAR' => ['required'],
            'KELAS_AJAR' => ['required'],
            'KELAS' => ['required'],
            'NAMA_DIKLAT' => ['required'],
            'TANGGAL_PERIODE_AWAL' => ['required'],
            'TANGGAL_PERIODE_AKHIR' => ['required'],
            'TEMPAT_DIKLAT' => ['required'],
            'RIWAYAT_DIKLAT' => ['required'],
            'FOTO' => ['required'],
            'KETERANGAN' => ['required'],
        ]);

        $photoPath = request()->file('FOTO')[0]->store('pasfoto-diklat');
        $input['FOTO'] = $photoPath;
        $input['JENIS_KELAMIN'] = 'L';

        $mappedInput = $this->diklatColumn->mapToTable($input);
        $this->diklatRepository->save($mappedInput);

        return redirect('/diklat');
    }

    public function getPhoto(string $path)
    {
        return Storage::download('pasfoto-diklat/' . $path);
    }
}
