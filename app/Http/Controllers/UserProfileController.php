<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view("userprofile");
        } else {
            return redirect('/login');
        }
    }

    public function updateUser(Request $request)
    {
        $id = $request->input('id');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');

        // Hash the password
        $hashedPassword = Hash::make($password);

        // Update operation
        $response = Http::put('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/updatePengguna?id=' .
            urlencode($id) . '&email=' . urlencode($email) . '&username=' . urlencode($username) . '&password=' .
            urlencode($hashedPassword));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Change this to handle the error as needed
        } else {
            // Redirect to the userprofile page
            return redirect()->route('userprofile');
        }
    }
}
