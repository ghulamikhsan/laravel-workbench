<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserAPIController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->select(
                'name', 'email', 'google_id', 'phone', 'address', 'avatar',
                'created_at', 'updated_at'
            )
            ->where('id', auth()->user()->id)
            ->first();
            return response()->json([
                'message' => 'User retrieved successfully',
                'status' => 1,
                'data' => $user]);
    }
}
