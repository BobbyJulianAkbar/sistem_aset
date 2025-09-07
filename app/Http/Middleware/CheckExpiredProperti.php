<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PropertiModel;

class CheckExpiredProperti
{
    public function handle(Request $request, Closure $next): Response
    {
        $now = now();

        PropertiModel::where('status_properti', 2)
            ->whereNotNull('expired_at')
            ->where('expired_at', '<=', $now)
            ->update(['status_properti' => 1, 'expired_at' => null]);

        return $next($request);
    }
}
