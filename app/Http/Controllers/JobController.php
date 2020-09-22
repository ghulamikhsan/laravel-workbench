<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Job;
use DB;

class JobController extends Controller
{
    public function index(Request $request)
    {

        // $jobs = Job::latest()->paginate(5);
        $jobs = DB::table('jobs')
                    ->join('users', 'users.id', '=', 'jobs.user_id')
                    ->join('status', 'status.id', '=', 'jobs.status_id')
                    ->select('jobs.id as id','jobs.user_id as name', 'jobs.kegiatan as kegiatan', 
                            'jobs.kendala as kendala', 'jobs.created_at as tanggal', 'status.status as status', 'users.name as name')
                    ->where('users.id', auth()->user()->id)
                    ->get();

        return view('job.index', \compact('jobs'));
    }

    public function create()
    {
        $jobs = DB::table('jobs')
                ->select('jobs.id as id', 'jobs.kegiatan as kegiatan', 
                            'jobs.kendala as kendala', 'jobs.status_id', 'jobs.user_id')
                ->get();
        $users = DB::table('users')
                    ->where('id', auth()->user()->id)
                    ->first(); 
        $status = DB::table('status')
                    ->select('status', 'id')
                    ->get(); 
        //   dd($job);             
        return view('job.create', \compact('jobs', 'users', 'status'));
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

    public function show($id)
    {
        $jobs = \App\Job::findOrFail($id);

        return view('job.show', ['jobs' => $jobs]);
    }

    public function edit(Job $jobs, $id)
    {
        // $users = DB::table('users')
        //             ->where('id', auth()->user()->id)
        //             ->first(); 


        $status = DB::table('status')
                    ->select('status', 'id')
                    ->get(); 
        // $jobs = DB::table('jobs')
        //             ->select('id','user_id','kegiatan','kendala', 'status_id')
        //             ->first();
        $jobs = DB::table('jobs')
                    ->select('id','user_id','kegiatan','kendala', 'status_id')
                    ->where('id', '=', $id)
                    ->first();
        // dd($jobs);
        return view('job.edit',compact('jobs', 'status' ));
    }

    public function update(Request $request, Job $jobs)
    {
        $request->validate([
            'kegiatan'  => 'required',
            'kendala'   => 'required',
            'status_id' => 'required'
        ]);

        DB::table('jobs')
            ->where('id', $request -> id)
            ->update([
              'kegiatan' => $request -> kegiatan,
              'kendala'  => $request -> kendala,   
              'status_id'  => $request -> status_id   
            ]);  

            // if ($status) {
            //     'selesai' == '1';
            // } else {
            //     'ditunda' == '0';
            //     'batal' == '0';
            // }
            
        // $jobs->update($request->all());

        return redirect()->route('job.index')
                        ->with('success','Kegiatan Hari ini berhasil diubah');
    }

    public function destroy(Job $job)
    {
        $job->delete();
  
        return redirect()->route('job.index')
                        ->with('success','Kegiatan Hari ini berhasil dihapus');
    }

    public function point(Job $jobs)
    {
        // $jobs = Job::find(1);

        // $jobs->update([
        //     'status' => $status
        // ]);

        $jobs = Job::where('status','=','1')->count();

        return view('job.index');
    }

}
