<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::admin()->role; 
      
          switch ($role) {
            case 'admin':
               return redirect('/admin');
               break;
            case 'super_admin':
               return redirect('/super_admin');
               break; 
      
            default:
               return redirect('/user'); 
               break;
          }
        }
        return $next($request);
      }
}
