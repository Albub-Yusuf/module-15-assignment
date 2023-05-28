<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FormValidationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validateData = Validator::make($request->all(),[
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);


        if($validateData->fails()){
           return response()->json(['errors' => $validateData->errors()],422);
        }

        return $next($request);
    }
}
