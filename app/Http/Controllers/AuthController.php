<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{  

    public function token(Request $request)
    {   
        if($request->api_secret !== md5(env('APP_KEY') . env('APP_USER-AGENT'))) {
            return response()->json(['title' => 'Error', 'message' => "Unauthorized"], 401);
        }
        
        return response()->json(['token' => md5(env('APP_KEY') . env('APP_USER-AGENT') . env("APP_SALT"))]);
    }
}
