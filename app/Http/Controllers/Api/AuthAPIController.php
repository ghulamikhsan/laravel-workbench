<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Socialite;
use Exception;
use Auth;
use DB;

class AuthAPIController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'username', 'password');
        $user = DB::table('users')
                    ->where('email', $request->email)
                    ->select(
                        'name', 'email','username','google_id', 'phone','address','avatar','created_at', 'updated_at'
                        )
                    ->get();
        // $username = DB::table('users')
        //             ->where('username', $request->username)
        //             ->select(
        //                 'name', 'email','username')
        //             ->get();
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Login Succesfully',
            'data' => [
                'user'=> $user,
                // 'username'  => $username,
                'token' => $token],
        ]);
    }
    public function google(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', '=', $email)->first();
        try { 
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::fromUser($user)) { 
                return response()->json(['error' => 'invalid_credentials'], 401);
            } 
        } catch (JWTException $e) { 
            // something went wrong 
            return response()->json(['error' => 'could_not_create_token'], 500); 
        } 

        
        // if no errors are encountered we can return a JWT 
        return response()->json(compact('token')); 
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password'),),
            'google_id' => $request->get('google_id'),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'User Register Succesfully',
            'status' => 1,
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
        ]);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}
