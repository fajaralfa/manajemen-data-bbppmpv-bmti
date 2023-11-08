<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Sekolah;
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
        $data = Sekolah::get();
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
        Sekolah::create($input);

        return redirect('/sekolah');
    }
    
    public function delete(string $id)
    {
        Sekolah::destroy($id);
        return redirect('/sekolah');
    }

    public function editPage(string $id)
    {
        $data = Sekolah::where('id', $id)->first();
        $input = $this->helper->mapTableToRequest($data->toArray());

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
        Sekolah::where('id', $id)->update($input);

        return redirect('/sekolah');
    }
}
