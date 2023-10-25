<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Repository\PrakerinRepository;
use Illuminate\Http\Request;

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
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required'],
            'JENIS_KELAMIN' => ['required'],
            'AGAMA' => ['required'],
            'ALAMAT_LENGKAP' => ['required'],
            'NO_HP' => ['required'],
            'EMAIL' => ['required'],
            'FOTO' => ['required'],
        ]);

        $input = $this->helper->mapRequestToTable($input);
        $this->prakerinRepository->save($input);

        return redirect('/prakerin');
    }

    public function delete(string $id)
    {
        $this->prakerinRepository->deleteById((int) $id);
        return redirect('/prakerin');
    }

    public function editPage(string $id)
    {
        $data = (array) $this->prakerinRepository->findById((int) $id);
        $input = $this->helper->mapTableToRequest($data);

        return inertia('Prakerin/FormEdit', ['input' => $input]);
    }

    public function edit(string $id)
    {
        $input = request()->validate([
            'NAMA_LENGKAP' => ['required'],
            'NAMA_SEKOLAH' => ['required'],
            'NIS/NIM' => ['required'],
            'BIDANG_KEAHLIAN' => ['required'],
            'PROGRAM_KEAHLIAN' => ['required'],
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required'],
            'JENIS_KELAMIN' => ['required'],
            'AGAMA' => ['required'],
            'ALAMAT_LENGKAP' => ['required'],
            'NO_HP' => ['required'],
            'EMAIL' => ['required'],
            'FOTO' => ['file'],
        ]);

        $input = $this->helper->mapRequestToTable($input);

        $this->prakerinRepository->update((int) $id, $input);
        return redirect('/prakerin');
    }
}
