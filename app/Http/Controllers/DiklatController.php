<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiklatController extends Controller
{
    public function view()
    {
        $data = DB::table('peserta_diklat')->get();
        return inertia('Diklat/View', ['data'=> $data]);
    }
}
