<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionUserController extends Controller
{
    public function create()
    {
        return view('form.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => 'Email atau Password yang anda masukkan salah',
                'password' => 'Email atau Password yang anda masukkan salah',
            ]);
        };

        $request->session()->regenerate();

        return redirect('/');
    }

    public function destory()
    {
        Auth::logout();
    }
}
