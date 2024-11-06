<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if user is not logged in
        if (!Auth::check()){
            return redirect()->route('login');
        }

        // check user role
        $userRole = Auth::user()->role;

        if($userRole == 1){                   //Admin
            return $next($request);
        }
        elseif($userRole == 2){               //Staff
            return redirect()->route('staff.dashboard');
        }
        elseif($userRole == 3){               //Faculty
            return redirect()->route('faculty.dashboard');
        }
        elseif($userRole == 4){               //SCholar
            return redirect()->route('dashboard');
        }
    }


}
