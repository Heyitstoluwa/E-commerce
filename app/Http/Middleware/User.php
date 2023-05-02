<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!Auth::user()) {
                return $next($request);
            }
            $role = Auth::user()->role;
            if ($role == "user") {
                return $next($request);
            } else {
                switch ($role) {
                    case "admin":
                        return redirect('/admin');
                        break;
                    default:
                        break;
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
