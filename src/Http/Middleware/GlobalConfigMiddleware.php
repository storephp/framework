<?php

namespace Bidaea\OutMart\Dashboard\Http\Middleware;

use Bidaea\OutMart\Dashboard\Models\Customer;
use Closure;
use Illuminate\Http\Request;

class GlobalConfigMiddleware
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
        config(['outmart.customers.model' => Customer::class]);

        return $next($request);
    }
}
