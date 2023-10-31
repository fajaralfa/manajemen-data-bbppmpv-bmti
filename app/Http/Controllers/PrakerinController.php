<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Repository\PrakerinRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrakerinController extends Controller
{
    public function __construct(
        private PrakerinRepository $prakerinRepository,
        private Helper $helper,
    ) {
    }

    public function view()
    {
        $data = $this->prakerinRepository->get();
        return inertia('Prakerin/View', ['data' => $data]);
    }

    public function store()
    {
        $input = request()->validate([
            'NAMA_LENGKAP' => ['required'],
            'NAMA_SEKOLAH' => ['required'],
            'NIS/NIM' => ['required'],
            'BIDANG_KEAHLIAN' => ['required'],
            'PROGRAM_KEAHLIAN' => ['required'],
            'KOMPETENSI_KEAHLIAN' => ['required'],
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required'],
            'JENIS_KELAMIN' => ['required'],
            'AGAMA' => ['required'],
            'ALAMAT_LENGKAP' => ['required'],
            'NO_HP' => ['required'],
            'EMAIL' => ['required'],
            'FOTO' => ['required'],
            'TANGGAL_MASUK' => ['required'],
            'TANGGAL_KELUAR' => ['required'],
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
        $this->prakerinRepository->save($input);

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

        $this->prakerinRepository->update((int) $id, $input);
        return redirect('/prakerin');
    }
}
