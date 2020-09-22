@extends('layouts.app')

@section('title')
    | Edit Kegiatan
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Kegiatan</h2>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a class="btn btn-primary" href="{{ route('job.index') }}"> Back</a>
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
   
<form action="{{ route('job.update', $jobs->id) }}" method="POST">
    @csrf
    @method("PUT")
 
  
     <div class="row">
     <input type="hidden" id="id" name="id" value="{{$jobs->id}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kegiatan:</strong>
                <textarea class="form-control" style="height:150px" name="kegiatan" value="" placeholder="Kegiatan">{{ $jobs->kegiatan }}</textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kendala:</strong>
                <textarea class="form-control" style="height:150px" name="kendala" placeholder="kendala hari ini">{{ $jobs->kendala }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status_id" class="form-control form-control-sm">
                @foreach ($status as $job)
                        <option value="{{$job->id}}">{{$job->status}}</option>
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