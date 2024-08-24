<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckDatabaseConnection
{
    public function handle(Request $request, \Closure $next): Response
    {
        try {
            DB::connection()->getPdo();
        } catch (\Throwable) {
            DB::setDefaultConnection('replica');
        }

        return $next($request);
    }
}
