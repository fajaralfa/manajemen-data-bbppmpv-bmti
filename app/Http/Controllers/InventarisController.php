<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Repository\InventarisRepository;
use Illuminate\Support\Facades\Storage;

class InventarisController extends Controller
{
    public function __construct(
        private InventarisRepository $inventarisRepository,
        private Helper $helper,
    ) {
    }

    public function view()
    {
        $filters = request()->collect()->only(['Nama_Peralatan', 'Waktu_Pengadaan', 'Kategori'])->all();

        $filters = $this->helper->mapRequestToTable($filters);

        $data = $this->inventarisRepository->getByFilters($filters);

        return inertia('Inventaris/View', ['data' => $data, 'q' => $filters]);
    }

    public function store()
    {
        $input = request()->validate([
            'Kategori' => [],
            'Nama_Peralatan' => ['required'],
            'Gambar' => ['required'],
            'Merk' => [],
            'Tipe' => [],
            'Spesifikasi' => ['required'],
            'Nomor_Seri' => [],
            'Satuan' => ['required'],
            'Volume' => [],
            'Harga_Satuan' => ['required'],
            'Jumlah' => ['required'],
            'Keterangan_Produk' => [],
            'Link_Produk' => ['required'],
            'Urgensi' => ['required'],
            'Waktu_Pengadaan' => [],
            'Waktu_Inventory' => [],
            'Kondisi' => ['in:baik,rusak,hilang'],
            'Keterangan' => [],
        ]);

        $input['Gambar'] = request()->file('Gambar')->store('foto-inventaris');
        $input = $this->helper->mapRequestToTable($input);
        $this->inventarisRepository->save($input);

        return redirect('/inventaris');
    }

    public function getPhoto(string $path)
    {
        return Storage::download('foto-inventaris/' . $path);
    }

    public function delete(string $id)
    {
        $this->inventarisRepository->deleteById((int) $id);
        return redirect('/inventaris');
    }

    public function editPage(string $id)
    {
        $data = (array) $this->inventarisRepository->findById((int) $id, [
            'Kategori',
            'Nama Peralatan',
            'Merk',
            'Tipe',
            'Spesifikasi',
            'Nomor Seri',
            'Satuan',
            'Volume',
            'Harga Satuan',
            'Jumlah',
            'Keterangan Produk',
            'Link Produk',
            'Urgensi',
            'Waktu Pengadaan',
            'Waktu Inventory',
            'Kondisi',
            'Keterangan',
        ]);
        $data =  $this->helper->mapTableToRequest($data);

        return inertia('Inventaris/FormEdit', ['input' => $data]);
    }

    public function edit(string $id)
    {
        $input = request()->only([
            'Kategori',
            'Nama_Peralatan',
            'Gambar',
            'Merk',
            'Tipe',
            'Spesifikasi',
            'Nomor Seri',
            'Satuan',
            'Volume',
            'Harga_Satuan',
            'Jumlah',
            'Keterangan_Produk',
            'Link_Produk',
            'Urgensi',
            'Waktu_Pengadaan',
            'Waktu_Inventory',
            'Kondisi',
            'Keterangan',
        ]);

        $input = $this->helper->mapRequestToTable($input);

        if (request()->has('Gambar')) {
            $oldGambar = $this->inventarisRepository->getPhotoNameById((int) $id);
            Storage::delete($oldGambar);
            $input['Gambar'] = request()->file('Gambar')->store('foto-inventaris');
        }

        $this->inventarisRepository->update((int) $id, $input);
        return redirect('/inventaris');
    }
}
