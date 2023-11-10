<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function login()
    {
        $input = request()->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($input, request()->post('remember'))) {
            return redirect('/home');
        }

        return redirect()->back()->withErrors(['message' => 'Username or password is wrong']);
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
