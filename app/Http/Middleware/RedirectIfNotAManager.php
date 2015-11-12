<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAManager
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

        /**
         * //Response before request;
         * $response = $next($request);
         *
         * $request->user();
         */
        

        /**
         * For testing middleware if not manager.
         *if($request->user() == null || !$request->user()->isATeamManager()) 
         *{
         *  return redirect('articles');
         * }
         */
        return $next($request);
    }
}
