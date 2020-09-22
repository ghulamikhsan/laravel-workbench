<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Admin;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $admins   = DB::table('jobs')
                    ->join('users', 'users.id', '=', 'jobs.user_id')
                    ->join('status', 'status.id', '=', 'jobs.status_id')
                    ->select('jobs.id as id','jobs.user_id as name', 'jobs.kegiatan as kegiatan', 
                            'jobs.kendala as kendala', 'jobs.created_at as tanggal', 'status.status as status', 'users.name as name')
                    // ->where('users.id')
                    ->get();

        return view('admin.home', compact('admins'));
    }

    
    public function create()
    {
        $admins = DB::table('jobs')
                ->select('jobs.id as id', 'jobs.kegiatan as kegiatan', 
                            'jobs.kendala as kendala', 'jobs.status_id', 'jobs.user_id')
                ->get();
        // $users = DB::table('users')
        //             ->where('id', auth()->user()->id)
        //             ->first(); 
        $status = DB::table('status')
                    ->select('status', 'id')
                    ->get(); 
         $users = DB::table('users')
                    ->select('name', 'id')
                    ->get(); 
        //   dd($job);             
        return view('admin.create', \compact('admins', 'users', 'status'));
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

            $admins = new Job();
            $admins->user_id = auth()->user()->id;
            $admins->kegiatan = $request->kegiatan;
            $admins->kendala = $request->kendala;
            $admins->status_id = $request->status_id;

            return redirect()
                    ->route('admin.index')
                    ->with('success', 'Kegiatan Hari ini berhasil ditambahkan');
    }

    public function show($id)
    {
        $admins = \App\Job::findOrFail($id);

        return view('admin.show', ['admins' => $admins]);
    }

    public function edit(Job $jobs, $id)
    {
        $status = DB::table('status')
                    ->select('status', 'id')
                    ->get(); 
        $admins = DB::table('jobs')
                    ->select('id','user_id','kegiatan','kendala', 'status_id')
                    ->where('id', '=', $id)
                    ->first();
        $users = DB::table('users')
                    ->select('name', 'id')
                    ->get(); 
        // dd($jobs);
        return view('admin.edit',compact('admins', 'status', 'users' ));
    }

    public function update(Request $request, Job $jobs)
    {
        $request->validate([
            'kegiatan' => 'required',
            'kendala' => 'required',
            'status_id' => 'required',
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

        return redirect()->route('admin.index')
                        ->with('success','Kegiatan Hari ini berhasil diubah');
    }

    public function destroy(Job $job)
    {
        $job->delete();
  
        return redirect()->route('admin.index')
                        ->with('success','Kegiatan Hari ini berhasil dihapus');
    }

    public function point(Job $jobs)
    {
        // $jobs = Job::find(1);

        // $jobs->update([
        //     'status' => $status
        // ]);

        $admins = Job::where('status','=','1')->count();

        return view('admin.index');
    }


}
