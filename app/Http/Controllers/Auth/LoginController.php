<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        // Check if the user is approved
        if (!$user->is_approved) {
            // Log out the user
            Auth::logout();

            // Redirect back to login with an error message
            return redirect()->route('login')->withErrors('Your account is pending approval.');
        }

        // Redirect to the intended page (or home page)
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
