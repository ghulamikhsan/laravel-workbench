@extends('layouts.app')

@section('title')
    | Data Kegiatan
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>WorkBench</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('job.create') }}"> Tambah Kegiatan</a>
            <a class="btn btn-success" href="{{ route('point.index') }}"> Lihat Point</a>
        </div>
    </div>
</div>
<br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <br>
    <table class="table table-bordered">
        <tr>
            {{-- <th>No</th> --}}
            <th>Nama</th>
            <th>Kegiatan</th>
            <th>Kendala</th>
            <th>Status</th>
            <th>Tanggal Pengerjaan</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($jobs as $job)
        <tr>
            {{-- <td>{{ $job->id }}</td> --}}
            <td>{{ $job->name }}</td>
            <td>{{ $job->kegiatan }}</td>
            <td>{{ $job->kendala }}</td>
            <td>{{ $job->status }}</td>
            <td>{{ $job->tanggal }}</td>
            <td>
                <form action="{{ route('job.destroy',$job->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('job.show',$job->id) }}">Detail</a>
    
                    <a class="btn btn-primary" href="{{ route('job.edit',$job->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection