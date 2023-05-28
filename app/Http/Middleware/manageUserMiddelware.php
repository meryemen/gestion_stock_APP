<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class manageUserMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loginId = Session::get('loginId');
        if ($loginId) {
            $user = User::find($loginId);
            if ($user && $user->manageUsers) {
                return $next($request);
            }
        }

        return Redirect::route('error');    
       }
}
