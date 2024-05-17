<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{

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
            return redirect('/login')->with('success', 'User baru berhasil ditambahkan!');
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['username' => 'Username sudah dipakai']);
        }
    }

    public function view()
    {
        $users = User::get();

        return inertia('Users/View', [
            'data' => $users
        ]);
    }
}
