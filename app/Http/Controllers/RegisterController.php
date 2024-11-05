<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function regist(Request $request)
    {
        $email = $request->input('email');
        $username = $request->input('username');
        $password = hash::make($request->input('password'));
        $role = '2';

        $response = Http::post(
            'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/register',
            [
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'role_id' => $role
            ]
        );

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/login');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }
}
