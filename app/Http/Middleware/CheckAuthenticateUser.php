<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $email = $request->header('email');
        $password = $request->header('password');

        if(($email == "admin@mail.com") && ($password == "admin123")){
            return $next($request);
        }
        else{
            return response()->json('Unauthorized Access',401);
        }

       
    }
}
