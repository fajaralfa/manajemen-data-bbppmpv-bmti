<?php

namespace App\Http\Controllers;

use App\Repository\SekolahRepository;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function __construct(
        private SekolahRepository $sekolahRepository
    ) {
    }
    public function view()
    {
        $data = $this->sekolahRepository->get();
        return inertia('Sekolah/View', ['data' => $data]);
    }
}
