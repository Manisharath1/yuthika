<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $loggedInUserRole = $request-> user()->role;
        // echo $loggedInUserRole; exit;

        // Get the selected role from the form
        $selectedRole = $request->input('role'); // e.g., 'admin', 'staff', etc.

        // Role mapping (Assumes 'admin', 'staff', etc. are mapped to roles in DB)
        // Make sure your database roles are consistent with these values.
        $roleMap = [
            'admin' => 1, // Admin role in DB
            'staff' => 2, // Staff role in DB
            'faculty' => 3, // Faculty role in DB
            'scholar' => 4, // Scholar role in DB
        ];
         //     //Admin
    //     if($loggedInUserRole == 1)
    //     {
    //         return redirect()->intended(route('admin.dashboard', absolute: false));
    //     }
    //     //Staff
    //     elseif($loggedInUserRole == 2){
    //         return redirect()->intended(route('staff.dashboard', absolute: false));
    //     }
    //     elseif($loggedInUserRole == 3){
    //         return redirect()->intended(route('faculty.dashboard', absolute: false));
    //     }
    //     return redirect()->intended(route('dashboard', absolute: false));
    // }

    // Check if the selected role matches the user's actual role
    if (isset($roleMap[$selectedRole]) && $loggedInUserRole == $roleMap[$selectedRole]) {

        // Redirect to respective dashboards based on roles
        switch ($selectedRole) {
            case 'admin':
                return redirect()->intended(route('admin.dashboard', absolute: false));
            case 'staff':
                return redirect()->intended(route('staff.dashboard', absolute: false));
            case 'faculty':
                return redirect()->intended(route('faculty.dashboard', absolute: false));
            case 'scholar':
                return redirect()->intended(route('dashboard', absolute: false));
        }
    } else {
        // If the role doesn't match, log the user out and return an error
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'role' => 'The selected role does not match your account role.',
        ]);
    }

    // Default redirection
    return redirect()->intended(route('dashboard', absolute: false));
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
