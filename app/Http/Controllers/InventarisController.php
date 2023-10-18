<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function view()
    {
        return inertia('Inventaris/View');
    }
}
