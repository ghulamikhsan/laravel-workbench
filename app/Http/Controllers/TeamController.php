<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Validator;
use DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = DB::table('teams')
                    ->join('users', 'users.id', '=', 'teams.user_id')
                    // ->join('status', 'status.id', '=', 'teams.status_id')
                    ->select('teams.id as id','teams.user_id as name', 'teams.created_at as tanggal', 
                            'teams.nama_tugas as tugas','teams.nama_team as team', 'users.name as name')
                    ->where('users.id')
                    ->get();

        return view('team.index', \compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = DB::table('teams')
                    ->select('teams.id as id', 'teams.nama_team as team', 
                                'teams.nama_tugas as tugas', 'teams.user_id')
                    ->get();
       $users = DB::table('users')
                    ->select('name', 'id')
                    ->get(); 
//   dd($job);             
        return view('team.create', \compact('teams', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $teams)
    {
        $request->validate([
            'user_id'   => 'required',
            'nama_team'  => 'required',
            'nama_tugas'    => 'required',
            
            ]);

        Team::create($request->all());

            $teams = new Team();
            $teams->user_id = $request->user_id;
            $teams->nama_team = $request->nama_team;
            $teams->nama_tugas = $request->nama_tugas;
        
            
        return redirect()
                    ->route('team.index')
                    ->with('success', 'Kegiatan Tim Hari ini berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teams = \App\Team::findOrFail($id);

        return view('team.show', ['teams' => $teams]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, $id)
    {
        $teams = DB::table('teams')
                    ->select('id','user_id','nama_team', 'nama_tugas')
                    ->where('id', '=', $id)
                    ->first();
        $users = DB::table('users')
                    ->select('name', 'id')
                    ->get(); 
         return view('team.edit',compact('teams', 'users' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'user_id'   => 'required',
            'nama_team'  => 'required',
            'nama_tugas'    => 'required',
        ]);

        DB::table('teams')
            ->where('id', $request -> id)
            ->update([
              'user_id' => $request -> user_id,
              'nama_team'  => $request -> nama_team,   
              'nama_tugas'  => $request -> nama_tugas   
            ]);  
        
              return redirect()->route('team.index')
                        ->with('success','Kegiatan Tim Hari ini berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
  
        return redirect()->route('team.index')
                        ->with('success','Kegiatan Tim Hari ini berhasil dihapus');
    }

    public function postData(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = json_encode($input['user_id']);
      
        Team::create($input);
       
        dd('Post created successfully.');
    }

}
