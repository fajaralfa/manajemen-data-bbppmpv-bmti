<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $req)
    {
        return inertia('OtherPage');
    }
}
