<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Repository\SekolahRepository;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function __construct(
        private SekolahRepository $sekolahRepository,
        private Helper $helper,
    ) {
    }

    public function view()
    {
        $data = $this->sekolahRepository->get();
        return inertia('Sekolah/View', ['data' => $data]);
    }

    public function store()
    {
        $input = request()->validate([
            'NAMA_SEKOLAH' => ['required'],
            'NPSN_SEKOLAH' => [],
            'NAMA_KEPALA_SEKOLAH' => [],
            'NOMOR_HP_KEPALA_SEKOLAH' => [],
            'JENJANG_SEKOLAH' => ['required'],
            'KABUPATEN_SEKOLAH' => ['required'],
            'PROVINSI_SEKOLAH' => ['required'],
        ]);

        $input = $this->helper->mapRequestToTable($input);
        $this->sekolahRepository->save($input);

        return redirect('/sekolah');
    }
    
    public function delete(string $id)
    {
        $this->sekolahRepository->deleteById((int) $id);
        return redirect('/sekolah');
    }

    public function editPage(string $id)
    {
        $data = (array) $this->sekolahRepository->findById((int) $id);
        $input = $this->helper->mapTableToRequest($data);

        return inertia('Sekolah/FormEdit', ['input' => $input]);
    }

    public function edit(string $id)
    {
        $input = request()->validate([
            'NAMA_SEKOLAH' => ['required'],
            'NPSN_SEKOLAH' => [],
            'NAMA_KEPALA_SEKOLAH' => [],
            'NOMOR_HP_KEPALA_SEKOLAH' => [],
            'JENJANG_SEKOLAH' => ['required'],
            'KABUPATEN_SEKOLAH' => ['required'],
            'PROVINSI_SEKOLAH' => ['required'],
        ]);

        
        $input = $this->helper->mapRequestToTable($input);

        $this->sekolahRepository->update((int) $id, $input);
        return redirect('/sekolah');
    }
}
