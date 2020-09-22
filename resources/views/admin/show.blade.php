@extends('layouts.admin')

@section('title')
    | Detail Pekerjaan
@endsection

@section('content')
<div class="col-md-8">
    <header><h2>Detail Pekerjaan</h2></header>
    <div class="card">
        <div class="card-body">
            <label><b>Nama</b></label><br>
            {{$admins->user_id}}
            <br><br>
            
            <label><b>Kegiatan</b></label><br>
            {{$admins->kegiatan}}
            <br><br>
            
            <label><b>Kendala</b></label><br>
            {{$admins->kendala}}
            <br><br>

            <label><b>Status</b></label><br>
            {{$admins->status}}
            <br><br>
        </div>
    </div>        
</div>
@endsection