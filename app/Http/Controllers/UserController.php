<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Database\UniqueConstraintViolationException;
use App\Models\User;

class UserController extends Controller
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

    public function register()
    {
        $input = request()->validate([
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required', Rule::in(['admin', 'operator'])],
        ]);

        try {
            User::create($input);
            return redirect('/login')->with(['message' => 'Register berhasil!, silakan login']);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['message' => 'Username sudah dipakai']);
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
