<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatusApiController extends Controller
{
    public function index()
    {
        $status = DB::table('status')
                    ->get();

        return response([
            'success'   => true,
            'message'   => 'List semua status',
            'data'      => $status
        ], 200);
    }
}
