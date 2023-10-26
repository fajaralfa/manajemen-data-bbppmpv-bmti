<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Repository\InventarisRepository;

class InventarisController extends Controller
{
    public function __construct(
        private InventarisRepository $inventarisRepository,
        private Helper $helper,
    ) {
    }

    public function view()
    {
        $data = $this->inventarisRepository->get();
        return inertia('Inventaris/View', ['data' => $data]);
    }

    public function store()
    {
        $input = request()->validate([
            'No' => ['required'],
            'Nama_Peralatan' => ['required'],
            'Gambar' => ['required'],
            'Spesifikasi' => ['required'],
            'Satuan' => ['required'],
            'Volume' => ['required'],
            'Harga_Satuan' => ['required'],
            'Jumlah' => ['required'],
            'Keterangan_Produk' => ['required'],
            'Link_Produk' => ['required'],
            'Urgensi' => ['required'],
        ]);

        $input = $this->helper->mapRequestToTable($input);
        $this->inventarisRepository->save($input);

        return redirect('/inventaris');
    }

    public function delete(string $id)
    {
        $this->inventarisRepository->deleteById((int) $id);
        return redirect('/inventaris');
    }

    public function editPage(string $id)
    {
        $data = (array) $this->inventarisRepository->findById((int) $id);

        return inertia('Inventaris/FormEdit', ['input' => $data]);
    }

    public function edit(string $id)
    {
        $input = request()->validate([
            'No' => ['required'],
            'Nama_Peralatan' => ['required'],
            'Gambar' => ['required'],
            'Spesifikasi' => ['required'],
            'Satuan' => ['required'],
            'Volume' => ['required'],
            'Harga_Satuan' => ['required'],
            'Jumlah' => ['required'],
            'Keterangan_Produk' => ['required'],
            'Link_Produk' => ['required'],
            'Urgensi' => ['required'],
        ]);

        $input = $this->helper->mapRequestToTable($input);

        $this->inventarisRepository->update((int) $id, $input);
        return redirect('/inventaris');
    }
}
