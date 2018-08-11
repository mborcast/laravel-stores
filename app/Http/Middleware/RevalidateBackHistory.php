<?php

namespace LaravelStores\Http\Middleware;

use Closure;

class RevalidateBackHistory
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
      return $next($request)->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
    }
}
