<?php

namespace App\Http\Middleware;

use App\Models\User; // Add this line
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the session username exists
        $username = $request->session()->get('username');
    
        if ($username) {
            // Set the user based on the session username
            Auth::setUser(User::where('username', $username)->first());
            return $next($request);
        }
    
        // If no session username, redirect to the login page
        return redirect('/login')->with('error', 'You must be logged in to access this page.');
    }
    
}
