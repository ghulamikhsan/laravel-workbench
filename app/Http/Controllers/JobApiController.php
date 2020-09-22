<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Job;
use Auth;
use DB;

class JobApiController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()
                ->where('user_id', auth()->user()->id)
                ->get();

        return response([
            'success'   => true,
            'message'   => 'List semua pekerjaan',
            'data'      => $jobs
        ], 200);
    }

    public function show(Job $jobs, $id)
    {
        $jobs = DB::table('jobs')
                    ->join('users', 'users.id', '=', 'jobs.user_id')
                    ->join('status', 'status.id', '=', 'jobs.status_id')
                    ->select('jobs.id as id','jobs.user_id as name', 'jobs.kegiatan as kegiatan', 
                            'jobs.kendala as kendala', 'jobs.created_at as tanggal', 'status.status as status', 'users.name as name')
                    ->where('users.id', $id)
                    ->get();

        if ($jobs) {
                return response()->json([
                    'success'   => true,
                    'message'   => 'Detail Pekerjaan',
                    'data'      => $jobs
                ], 200);
            } else {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data tidak ditemukan',
                    'data'      => ''
                ], 404);
            }
    }

    public function update(Request $request,$id)
    {
        $jobs = DB::table('jobs')
            ->where('id', $id)
            ->update([
            'kegiatan' => $request->kegiatan,
            'kendala' => $request->kendala,
            'status_id' => $request->status_id,]);
        
        return response()->json([
            'status'   => true,
            'message'  => 'Data kegiatan berhasil di update',
            'data'     => $jobs,
        ]);
            
    }

    public function create(Request $request)
    {
       

        $jobs = DB::table('jobs')->insert([
            'user_id' => auth()->user()->id,
            'kegiatan' => $request->kegiatan,
            'kendala' => $request->kendala,
            'status_id' => $request->status_id
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Data kegiatan berhasil di tambahkan',
            'data'  => $jobs,
        ]);
    }

    public function delete(Job $jobs)
    {
        // $this->authorize('delete', $post);
        
        $jobs->delete();

        return response()->json([
            'message' => 'Kegiatan berhasil dihapus',
        ]);
    }

    
}
