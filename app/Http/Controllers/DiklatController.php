<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiklatController extends Controller
{
    public function view()
    {
        return inertia('Diklat/View');
    }
}
