<?php

namespace App\Http\Controllers;

use App\Repository\DiklatRepository;
use App\Repository\InventarisRepository;
use App\Repository\PrakerinRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private DiklatRepository $diklatRepository,
        private PrakerinRepository $prakerinRepository,
        private InventarisRepository $inventarisRepository,
    ) {
    }
    public function __invoke()
    {
        $year = date('Y');
        $jumlahDiklat = $this->diklatRepository->countByYear((int) $year);
        $jumlahPrakerin = $this->prakerinRepository->countByYear((int)$year);
        $jumlahInventaris = $this->inventarisRepository->countByYear((int)$year);

        return inertia('Home', [
            'data' => [
                'jumlahDiklat' => $jumlahDiklat,
                'jumlahPrakerin' => $jumlahPrakerin,
                'jumlahInventaris' => $jumlahInventaris,
            ]
        ]);
    }
}
