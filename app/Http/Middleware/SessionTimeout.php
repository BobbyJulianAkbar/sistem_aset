<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    // Session lifetime in seconds (20 mins)
    protected $timeout = 1200; // 20 * 60

    public function handle($request, Closure $next)
    {
        if (!session()->has('last_activity')) {
            session(['last_activity' => now()->timestamp]);
        } elseif (now()->timestamp - session('last_activity') > $this->timeout) {
            Auth::logout();
            session()->flush();
            return redirect('/')->withErrors(['message' => 'Sesi Anda telah berakhir. Silakan login lagi.']);
        }

        session(['last_activity' => now()->timestamp]);

        return $next($request);
    }
}
