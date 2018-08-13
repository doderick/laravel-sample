<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if ($request->is('signup')) {
                $msg = '您已注册且处于登录状态！';
            } elseif ($request->is('login')) {
                $msg = '您已登录，无需重复操作！';
            } elseif ($request->is('password/reset')) {
                $msg = '您已登录，操作无效！';
            }

            session()->flash('info', $msg);
            return redirect()->back();
        }

        return $next($request);
    }
}
