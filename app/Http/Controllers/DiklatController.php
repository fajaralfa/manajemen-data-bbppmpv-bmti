<?php

namespace App\Http\Controllers;

use App\Helper\Converter;
use App\Helper\Helper;
use App\Models\Diklat;
use App\Models\Sekolah;
use App\Repository\DiklatRepository;
use App\Repository\JoinRepository;
use App\Repository\SekolahRepository;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class DiklatController extends Controller
{
    public function __construct(
        private DiklatRepository $diklatRepository,
        private SekolahRepository $sekolahRepository,
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
            'TANGGAL PERIODE AKHIR', 'TEMPAT DIKLAT', 'RIWAYAT DIKLAT', 'FOTO', 'KETERANGAN',
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
            'NIK' => ['required', 'numeric'],
            'NUPTK' => ['required', 'numeric'],
            'NIP' => ['required', 'numeric'],
            'NO_UKG' => ['required', 'numeric'],
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required', 'date_format:Y-m-d'],
            'USIA' => ['required', 'numeric'],
            'KELAMIN' => ['required', 'in:L,P'],
            'JABATAN' => ['required'],
            'GOLONGAN' => ['required'],
            'NOMOR_HP' => ['required'],
            'EMAIL' => ['required', 'email'],
            'MAPEL_AJAR' => ['required'],
            'KELAS_AJAR' => ['required'],
            'NPSN_SEKOLAH' => ['required'],
            'KELAS' => ['required'],
            'NAMA_DIKLAT' => ['required'],
            'TANGGAL_PERIODE_AWAL' => ['required', 'date_format:Y-m-d'],
            'TANGGAL_PERIODE_AKHIR' => ['required', 'date_format:Y-m-d'],
            'TEMPAT_DIKLAT' => ['required'],
            'RIWAYAT_DIKLAT' => ['required'],
            'FOTO' => ['required', 'image'],
            'KETERANGAN' => ['required'],
        ]);

        $photoPath = request()->file('FOTO')->store('diklat/photo');
        // get file name only
        $photoFileName = explode('/', $photoPath)[2];
        $input['FOTO'] = $photoFileName;

        $mappedInput = $this->helper->mapRequestToTable($input);

        try {
            Diklat::create($mappedInput);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIK' => 'NIK Sudah Digunakan']);
        }

        return redirect('/diklat');
    }

    public function getPhoto(string $path)
    {
        return Storage::download('diklat/photo/' . $path);
    }

    public function editPage(string $id)
    {
        $oldData = Diklat::where('id', $id)->first([
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
            'NPSN SEKOLAH',
            'KELAS',
            'NAMA DIKLAT',
            'TANGGAL PERIODE AWAL',
            'TANGGAL PERIODE AKHIR',
            'TEMPAT DIKLAT',
            'RIWAYAT DIKLAT',
            'KETERANGAN',
        ]);
        $oldData = $this->helper->mapTableToRequest($oldData->toArray());

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
            'NPSN_SEKOLAH',
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
            $oldPhoto = Diklat::where('id', $id)->first()?->FOTO;
            if ($oldPhoto) {
                Storage::delete('diklat/photo/' . $oldPhoto);
            }
            $photoPath = request()->file('FOTO')->store('diklat/photo');
            $photoFileName = explode('/', $photoPath)[2];
            $input['FOTO'] = $photoFileName;
        }

        $input = $this->helper->mapRequestToTable($input);

        try {
            Diklat::where('id', $id)->update($input);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIK' => 'NIK Sudah Digunakan']);
        }
        return redirect('/diklat');
    }

    public function delete(string $id)
    {
        Diklat::destroy($id);
        return redirect('/diklat');
    }

    public function import()
    {
        request()->validate(['file' => 'required']);
        $filePath = request()->file('file')->store('diklat/imported-data');
        $filePath = Storage::path($filePath);

        $matrix = $this->xlsx->load($filePath)->getSheet(0)->toArray();
        $data = collect($matrix);

        $columnName = collect($data[0]);
        $allData = $data->splice(1);

        $dataAssoc = $allData->mapWithKeys(function ($item, $key) use ($columnName) {
            $item = $columnName->combine($item);
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

            $new['TANGGAL LAHIR'] = $this->converter->formatDate($new['TANGGAL LAHIR']);
            $new['TANGGAL PERIODE AWAL'] = $this->converter->formatDate($new['TANGGAL PERIODE AWAL']);
            $new['TANGGAL PERIODE AKHIR'] = $this->converter->formatDate($new['TANGGAL PERIODE AKHIR']);

            return [$key => $new];
        })->unique('NIK')->all();

        Sekolah::insertOrIgnore($dataSekolah);
        Diklat::insertOrIgnore($dataDiklat);

        return redirect('/diklat');
    }

    public function getDataSekolah()
    {
        $data = Sekolah::get(['NPSN SEKOLAH', 'NAMA SEKOLAH']);
        $data = $data->mapWithKeys(function ($item, $key) {
            $item = $item->toArray();
            $key = $item['NPSN SEKOLAH'];
            $value = $item['NAMA SEKOLAH'];
            return [$key => $value];
        });

        return $data;
    }
}
