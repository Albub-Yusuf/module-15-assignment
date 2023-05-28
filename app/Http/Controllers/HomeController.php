<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function __construct(){
        $this->middleware('log');
   }

    public function showValidateData(Request $request){

        return response()->json([
            'message' => 'Registration Successful!!'
        ],200);
    }


    public function profile(Request $request){
        return "welcome {$request->header('email')} this is your profile page";
    }


    public function settings(Request $request){
        return "welcome {$request->header('email')} this is your settings page";
    }

    public function welcome(){
        return view('welcome');
    }

}
