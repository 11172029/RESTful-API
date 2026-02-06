<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
          $validator = Validator::make($request->all(), [
            
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');
       
        if(!$token = auth()->guard('api')->attempt($credentials)){
            return response()->json([
                'success' => false,
                'mesaage' => 'User atau Password Salah'
            ], 401);
        };

        return response()->json([
            'success' => true,
            'message' => 'Login Berhasil',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ]);
    }
}
