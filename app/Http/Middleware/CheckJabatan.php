<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckJabatan
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && in_array($user->jabatan, [1, 2])) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
    }
}
