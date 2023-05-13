<?php

namespace Store\Dashboard\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission = false)
    {
        if ($user = Auth::guard('store')->user()) {

            abort_if(!$user->membership, 404);

            if (in_array('*', $user->membership->rule->permissions)) {
                return $next($request);
            }

            abort_if(!in_array($permission, $user->membership->rule->permissions), 401);

            return $next($request);
        }

        return redirect(route('store.admin.login'));
    }
}
