<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Job;
use DB;

class PointController extends Controller
{
    public function index(Request $request)
    {

        // $jobs = Job::latest()->paginate(5);
        $points = DB::table('jobs')
                    ->join('users', 'users.id', '=', 'jobs.user_id')
                    ->join('status', 'status.id', '=', 'jobs.status_id')
                    ->select('jobs.id as id','jobs.user_id as name', 'status.status as status', 'users.name as name') 
                    ->where('users.id', auth()->user()->id)
                    ->get();

        $counts = DB::table('jobs')
                    ->join('users', 'users.id', '=', 'jobs.user_id')
                    ->join('status', 'status.id', '=', 'jobs.status_id')
                    ->select('jobs.id as id','jobs.user_id as name', 'status.status as status', 'users.name as name') 
                    ->where('jobs.status_id')
                    ->count();

        return view('point.index', \compact('points', 'counts'));
    }


    public function store(Request $request, Job $jobs)
    {
        $request->validate([
            'user_id'   => 'required',
            'kegiatan'  => 'required',
            'kendala'   => 'required',
            'status_id'    => 'required',
            
            ]);

            Job::create($request->all());

            $jobs = new Job();
            $jobs->user_id = auth()->user()->id;
            $jobs->kegiatan = $request->kegiatan;
            $jobs->kendala = $request->kendala;
            $jobs->status_id = $request->status_id;

            return redirect()
                    ->route('job.index')
                    ->with('success', 'Kegiatan Hari ini berhasil ditambahkan');
    }

    

}
