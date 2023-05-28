<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       
       $validateData = Validator::make($request->all(),[
        'name' => 'required|string|min:2',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    // Get the form data from the request
    $name = $request->input('name');
    $email = $request->input('email');
    $message = $request->input('message');


    if($validateData->fails()){
       return response()->json(['errors' => $validateData->errors()],422);
    }else{

      return response()->json([
        'notification' => 'Mail Send Successfully!',
        'sender' => $name,
        'email' => $email,
        'message' => $message
      ],200);
  }

    }

       
     
}
