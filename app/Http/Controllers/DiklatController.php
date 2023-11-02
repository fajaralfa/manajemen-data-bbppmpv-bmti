<?php

namespace App\Http\Controllers;

use App\Helper\Converter;
use App\Helper\Helper;
use App\Repository\DiklatRepository;
use App\Repository\JoinRepository;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class DiklatController extends Controller
{
    public function __construct(
        private DiklatRepository $diklatRepository,
        private JoinRepository $joinRepository,
        private Xlsx $xlsx,
        private Converter $converter,
        private Helper $helper,
    ) {
    }
    public function view()
    {
        $qTahun = request()->query('tahun');
        $qNama = request()->query('nama');
        $data = $this->joinRepository->filterByNamaTahun($qNama, $qTahun, [
            'diklat.ID AS ID', 'NIK', 'NUPTK', 'NIP', 'NO UKG', 'NAMA LENGKAP', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'USIA', 'KELAMIN',
            'JABATAN', 'GOLONGAN', 'NOMOR HP', 'EMAIL', 'KOMPETENSI KEAHLIAN', 'PROGRAM KEAHLIAN', 'BIDANG KEAHLIAN',
            'MAPEL AJAR', 'KELAS AJAR', 'NAMA SEKOLAH', 'diklat.NPSN SEKOLAH', 'NAMA KEPALA SEKOLAH', 'NOMOR HP KEPALA SEKOLAH',
            'JENJANG SEKOLAH', 'KABUPATEN SEKOLAH', 'PROVINSI SEKOLAH', 'KELAS', 'NAMA DIKLAT', 'TANGGAL PERIODE AWAL',
            'TANGGAL PERIODE AKHIR', 'TEMPAT DIKLAT', 'RIWAYAT DIKLAT', 'FOTO',
        ]);
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
            'NIK' => ['required'],
            'NUPTK' => ['required'],
            'NIP' => ['required'],
            'NO_UKG' => ['required'],
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required'],
            'USIA' => ['required'],
            'KELAMIN' => ['required'],
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

        $photoPath = request()->file('FOTO')->store('foto-diklat');
        $input['FOTO'] = $photoPath;

        $mappedInput = $this->helper->mapRequestToTable($input);

        try {
            $this->diklatRepository->save($mappedInput);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIK' => 'NIK Sudah Digunakan']);
        }

        return redirect('/diklat');
    }

    public function getPhoto(string $path)
    {
        return Storage::download('foto-diklat/' . $path);
    }

    public function editPage(string $id)
    {
        $oldData = $this->helper->mapTableToRequest((array) $this->diklatRepository->findById($id, [
            'NAMA LENGKAP',
            'KOMPETENSI KEAHLIAN',
            'PROGRAM KEAHLIAN',
            'BIDANG KEAHLIAN',
            'NIK',
            'NUPTK',
            'NIP',
            'NO UKG',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'USIA',
            'KELAMIN',
            'JABATAN',
            'GOLONGAN',
            'NOMOR HP',
            'EMAIL',
            'MAPEL AJAR',
            'KELAS AJAR',
            'KELAS',
            'NAMA DIKLAT',
            'TANGGAL PERIODE AWAL',
            'TANGGAL PERIODE AKHIR',
            'TEMPAT DIKLAT',
            'RIWAYAT DIKLAT',
            'KETERANGAN',
        ]));
        return inertia('Diklat/FormEdit', [
            'input' => $oldData
        ]);
    }

    public function edit(string $id)
    {
        $input = request()->only([
            'NAMA_LENGKAP',
            'KOMPETENSI_KEAHLIAN',
            'PROGRAM_KEAHLIAN',
            'BIDANG_KEAHLIAN',
            'NIK',
            'NUPTK',
            'NIP',
            'NO_UKG',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'USIA',
            'KELAMIN',
            'JABATAN',
            'GOLONGAN',
            'NOMOR_HP',
            'EMAIL',
            'MAPEL_AJAR',
            'KELAS_AJAR',
            'KELAS',
            'NAMA_DIKLAT',
            'TANGGAL_PERIODE_AWAL',
            'TANGGAL_PERIODE_AKHIR',
            'TEMPAT_DIKLAT',
            'RIWAYAT_DIKLAT',
            'FOTO',
            'KETERANGAN',
        ]);

        if (request()->has('FOTO')) {
            $oldPhoto = $this->diklatRepository->getPhotoPath((int) $id);
            Storage::delete($oldPhoto);
            $photoPath = request()->file('FOTO')->store('foto-diklat');
            $input['FOTO'] = $photoPath;
        }

        $input = $this->helper->mapRequestToTable($input);

        try {
            $this->diklatRepository->update((int) $id, $input);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIK' => 'NIK Sudah Digunakan']);
        }
        return redirect('/diklat');
    }

    public function delete(string $id)
    {
        $this->diklatRepository->deleteById((int) $id);
        return redirect('/diklat');
    }

    private Collection $columnName;
    public function import()
    {
        request()->validate(['file' => 'required']);
        $filePath = request()->file('file')->store('excel-diklat');
        $filePath = __DIR__ . '/../../../storage/app/' . $filePath;
        $excel = $this->xlsx->load($filePath)->getSheet(0);
        $excelArray = $excel->toArray();

        $this->columnName = collect($excelArray[0]);
        $data = collect($excelArray);

        // menghapus baris pertama (nama kolom)
        $data = $data->splice(1);

        $dataAssoc = $data->mapWithKeys(function ($item, $key) {
            $item = $this->columnName->combine($item);
            return [$key => $item];
        });

        $dataSekolah = $dataAssoc->mapWithKeys(function (Collection $item, $key) {
            $new = $item->only([
                'NAMA SEKOLAH', 'NPSN SEKOLAH', 'NAMA KEPALA SEKOLAH',
                'NOMOR HP KEPALA SEKOLAH', 'JENJANG SEKOLAH', 'KABUPATEN SEKOLAH',
                'PROVINSI SEKOLAH',
            ])->all();
            return [$key => $new];
        })->unique('NPSN SEKOLAH')->all();

        $dataDiklat = $dataAssoc->mapWithKeys(function (Collection $item, $key) {
            $new = $item->only([
                'NIK', 'NUPTK', 'NIP', 'NO UKG', 'NAMA LENGKAP',
                'TEMPAT LAHIR', 'TANGGAL LAHIR', 'USIA', 'KELAMIN',
                'JABATAN', 'GOLONGAN', 'NOMOR HP', 'EMAIL', 'KOMPETENSI KEAHLIAN',
                'PROGRAM KEAHLIAN', 'BIDANG KEAHLIAN', 'MAPEL AJAR',
                'KELAS AJAR', 'NPSN SEKOLAH', 'KELAS', 'NAMA DIKLAT',
                'TANGGAL PERIODE AWAL', 'TANGGAL PERIODE AKHIR', 'TEMPAT DIKLAT',
                'RIWAYAT DIKLAT', 'FOTO', 'KETERANGAN',
            ])->all();

            $new['TANGGAL PERIODE AWAL'] = $this->converter->formatDate($new['TANGGAL PERIODE AWAL']);
            $new['TANGGAL PERIODE AKHIR'] = $this->converter->formatDate($new['TANGGAL PERIODE AKHIR']);
            return [$key => $new];
        })->unique('NIK')->all();

        DB::table('sekolah')->insertOrIgnore($dataSekolah);
        DB::table('diklat')->insertOrIgnore($dataDiklat);

        return redirect('/diklat');
    }
}
