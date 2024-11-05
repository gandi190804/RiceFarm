<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = User::where('role_id', 1)->get();
        return view('login', [
            // "tes" => $data
            // 'data'=>Hash::make('password123')

        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role_id == '1') {
                return redirect()->intended('admin');
            } elseif ($user->role_id == '2') {
                return redirect()->intended('/');
            }
            // return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Akun belum terdaftar.',
        ])->onlyInput('email');
    }

    public function signout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
