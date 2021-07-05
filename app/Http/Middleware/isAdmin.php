<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Admin;


class IsAdmin
{
     public function handle($request, Closure $next)
     {
          if (Auth::user() &&  Auth::user()->type == 1) {
                 return $next($request);
          }

         return redirect('/');
     }
}
