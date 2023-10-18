<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrakerinController extends Controller
{
    public function view()
    {
        return inertia('Prakerin/View');
    } 
}
