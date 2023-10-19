<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $input = $req->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($input)) {
            return redirect('/home');
        }

        return redirect()->back();
        
    }

    // belum beres cok
    public function register(Request $req)
    {
        $input = $req->validate([
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required', Rule::in(['admin', 'operator'])],
        ]);

        return inertia('Register');
    }
}
