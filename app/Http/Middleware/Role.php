<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
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
            $role = Auth::user()->role;
            if ($role == "admin") {
                return $next($request);
            } else {
                switch ($role) {
                    case "user":
                        return redirect('/account');
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
