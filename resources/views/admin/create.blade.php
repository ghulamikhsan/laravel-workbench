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
            <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
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
   
<form action="{{ route('admin.store') }}" method="POST">
    @csrf
  
     <div class="row">
     {{-- <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}"> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Anggota : </strong>
                <select  class="form-control form-control sm" name="user_id">
                    @foreach ($users as $admin)
                        <option value="{{$admin->id}}">{{$admin->name}}</option>
                     @endforeach
                  </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kegiatan:</strong>
                <textarea class="form-control" style="height:150px" name="kegiatan" placeholder="Kegiatan hari ini"></textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kendala:</strong>
                <textarea class="form-control" style="height:150px" name="kendala" placeholder="kendala hari ini"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status_id" class="form-control form-control-sm">
                @foreach ($status as $admin)
                        <option value="{{$admin->id}}">{{$admin->status}}</option>
                @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection