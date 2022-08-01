<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthExternalApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('data')) {

            if($request->ajax()){
                return response()->json(["status" => "disconnected"], 200,);
            }else{

                return redirect(route('Login_routes'));
            }

            // return route('login_routes');
        }
        return $next($request);
    }
}
