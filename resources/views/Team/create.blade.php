@extends('layouts.admin')

@section('title')
    | Buat Kegiatan
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Kegiatan</h2>
        </div>

    
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a class="btn btn-primary" href="{{ route('team.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('team.store') }}" method="POST">
    @csrf
  
     <div class="row">
     {{--   <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}"> --}}
     {{-- <form method="post" action="{{ route('TeamController@postData') }}" enctype="multipart/form-data"> --}}
        @csrf   
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Tim :</strong>
                <textarea class="form-control" type="text" name="nama_team" placeholder="Nama Tim Anda"></textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Anggota : </strong>
                <select class="selectpicker" multiple data-live-search="true" name="user_id">
                    @foreach ($users as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                     @endforeach
                  </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tugas : </strong>
                <textarea class="form-control" type="text" name="nama_tugas" placeholder="Tugas Yang Akan Diberikan"></textarea>
            </div>
        </div>

        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status_id" class="form-control form-control-sm">
                @foreach ($status as $team)
                        <option value="{{$team->id}}">{{$team->status}}</option>
                @endforeach
                </select>
            </div>
        </div> --}}
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <style type="text/css">
        .dropdown-toggle{
            height: 40px;
            width: 400px !important;
        }
    </style>

<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
@endsection