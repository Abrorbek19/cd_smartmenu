<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;


class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->is('restaran/*')) {
            Visitor::query()->insert([
                'ip_address' => $request->ip(),
                'url' => $request->fullUrl(),
                'created_at' => now(),
            ]);
        }

        return $next($request);
    }
}
