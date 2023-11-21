<?php

namespace App\Http\Controllers;

use App\Helper\Converter;
use App\Helper\Helper;
use App\Repository\PrakerinRepository;
use App\Models\Prakerin;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class PrakerinController extends Controller
{
    public function __construct(
        private PrakerinRepository $prakerinRepository,
        private Helper $helper,
        private Xlsx $xlsx,
        private Converter $converter,
    ) {
    }

    public function view()
    {
        $qNama = request()->query('nama');
        $qNis = request()->query('nis');
        $qTahun = request()->query('tahun');
        $data = $this->prakerinRepository->filterNamaNisTahun($qNama, $qNis, $qTahun);
        return inertia('Prakerin/View', ['data' => $data]);
    }

    public function viewDetail(string $id)
    {
        return inertia('Prakerin/ViewDetail', [
            'data' => Prakerin::first()
            ]);
    }

    public function store()
    {
        $input = request()->validate([
            'NAMA_LENGKAP' => ['required'],
            'NAMA_SEKOLAH' => ['required'],
            'NIS/NIM' => ['required', 'numeric'],
            'BIDANG_KEAHLIAN' => ['required'],
            'PROGRAM_KEAHLIAN' => ['required'],
            'KOMPETENSI_KEAHLIAN' => ['required'],
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required', 'date_format:Y-m-d'],
            'JENIS_KELAMIN' => ['required'],
            'AGAMA' => ['required'],
            'ALAMAT_LENGKAP' => ['required'],
            'NO_HP' => ['required'],
            'EMAIL' => ['required'],
            'FOTO' => ['required'],
            'TANGGAL_MASUK' => ['required', 'date_format:Y-m-d'],
            'TANGGAL_KELUAR' => ['required', 'date_format:Y-m-d'],
            'TEMPAT/DEPARTEMEN_PELAKSANAAN' => ['required'],
            'NAMA_SEKOLAH' => ['required'],
            'KABUPATEN/KOTA_SEKOLAH' => ['required'],
            'STATUS_SEKOLAH' => ['required'],
            'NSS' => [],
            'ALAMAT_LENGKAP_SEKOLAH' => ['required'],
            'POSEL_SEKOLAH' => ['required'],
            'HOBBY' => ['required'],
        ]);

        $input = $this->helper->mapRequestToTable($input);
        $photoPath = request()->file('FOTO')->store('foto-prakerin');
        $input['FOTO'] = $photoPath;

        try {
            $this->prakerinRepository->save($input);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIS/NIM' => 'NIS/NIM sudah dipakai']);
        }

        return redirect('/prakerin');
    }

    public function getPhoto(string $path)
    {
        return Storage::download('foto-prakerin/' . $path);
    }

    public function delete(string $id)
    {
        $this->prakerinRepository->deleteById((int) $id);
        return redirect('/prakerin');
    }

    public function editPage(string $id)
    {
        $data = (array) $this->prakerinRepository
            ->findById((int) $id, [
                'NAMA LENGKAP', 'NAMA SEKOLAH', 'NIS/NIM', 'BIDANG KEAHLIAN',
                'PROGRAM KEAHLIAN', 'KOMPETENSI KEAHLIAN', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'JENIS KELAMIN',
                'AGAMA', 'ALAMAT LENGKAP', 'NO HP', 'EMAIL', 'HOBBY', 'TANGGAL MASUK',
                'TANGGAL KELUAR', 'TEMPAT/DEPARTEMEN PELAKSANAAN', 'NAMA SEKOLAH', 'KABUPATEN/KOTA SEKOLAH',
                'STATUS SEKOLAH', 'NSS', 'ALAMAT LENGKAP SEKOLAH', 'POSEL SEKOLAH',
            ]);
        $input = $this->helper->mapTableToRequest($data);

        return inertia('Prakerin/FormEdit', ['input' => $input]);
    }

    public function edit(string $id)
    {
        $input = request()->only([
            'NAMA_LENGKAP', 'NAMA_SEKOLAH', 'NIS/NIM', 'BIDANG_KEAHLIAN',
            'PROGRAM_KEAHLIAN', 'KOMPETENSI_KEAHLIAN', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'JENIS_KELAMIN',
            'AGAMA', 'ALAMAT_LENGKAP', 'NO_HP', 'EMAIL', 'FOTO',
            'HOBBY', 'TANGGAL_MASUK', 'TANGGAL_KELUAR', 'TEMPAT/DEPARTEMEN_PELAKSANAAN', 'NAMA_SEKOLAH',
            'KABUPATEN/KOTA_SEKOLAH', 'STATUS_SEKOLAH', 'NSS', 'ALAMAT_LENGKAP_SEKOLAH', 'POSEL_SEKOLAH',
        ]);

        if (request()->has('FOTO')) {
            $oldPhoto = ((array) $this->prakerinRepository->findById((int) $id))['FOTO'];
            Storage::delete('foto-prakerin/' . $oldPhoto);

            $newPhoto = request()->file('FOTO')->store('foto-prakerin');
            $input['FOTO'] = $newPhoto;
        }

        $input = $this->helper->mapRequestToTable($input);

        try {
            $this->prakerinRepository->update((int) $id, $input);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIS/NIM' => 'NIS/NIM sudah dipakai']);
        }
        return redirect('/prakerin');
    }

    public function export(string $id)
    {
        $prakerin = $this->prakerinRepository->findById($id);
        $processor = new TemplateProcessor(__DIR__ . '/../../../storage/in.docx');

        $prakerinC = collect((array) $prakerin)->except('FOTO');
        $processor->setValues($prakerinC->toArray());
        $processor->setImageValue('FOTO', __DIR__ . '\\..\\..\\..\\storage\\app\\' . $prakerin->FOTO);

        $processor->saveAs(__DIR__ . '/../../../storage/out.docx');
        return 'sukses';
    }

    public function import()
    {
        request()->validate(['file' => 'required']);
        $filePath = request()->file('file')->store('prakerin/spreadsheet');
        $filePath = Storage::path($filePath);

        $matrix = $this->xlsx->load($filePath)->getSheet(0)->toArray();

        $collection = collect($matrix);

        $columnNames = collect($collection->get(0))->map(fn ($item, $key) => trim($item));
        $data = $collection->splice(1);

        $assocData = $data->mapWithKeys(function ($item, $key) use ($columnNames) {
            $item = $columnNames->combine($item);
            $item['TANGGAL LAHIR'] = $this->converter->formatDate($item['TANGGAL LAHIR']);
            $item['TANGGAL MASUK'] = $this->converter->formatDate($item['TANGGAL MASUK']);
            $item['TANGGAL KELUAR'] = $this->converter->formatDate($item['TANGGAL KELUAR']);
            return [$key => $item];
        })->toArray();

        Prakerin::insertOrIgnore($assocData);

        return redirect('/prakerin');
    }
}
