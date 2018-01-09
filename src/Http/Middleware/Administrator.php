<?php

namespace VladislavTkachenko\Admin\Http\Middleware;

use Closure;

class Administrator
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
        if(config('sleeping_owl_extend.auth')){
            $prefix = config('sleeping_owl.url_prefix', 'admin');

            if(!auth()->user())
                return redirect("/$prefix/login");

            if(config('sleeping_owl_extend.check_admin')){
                if(!auth()->user()->isAdmin()){
                    return redirect('/');
                }
            }
        }

        return $next($request);
    }
}
