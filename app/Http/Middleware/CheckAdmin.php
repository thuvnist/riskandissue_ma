<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->level !== User::ADMIN) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
