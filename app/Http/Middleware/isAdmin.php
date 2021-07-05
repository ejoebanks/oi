<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
{
     public function handle($request, Closure $next)
     {
          if (Auth::user() &&  Auth::user()->type !== 1) {
                return redirect('/');
          }
          return $next($request);


     }
}
