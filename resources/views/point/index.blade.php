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
            
            <th>Nama</th>
            <th>Point</th>
            
        </tr>

        @foreach ($points as $point)
        <tr>
            {{-- <td>{{ $job->id }}</td> --}}
            <td>{{ $point->name }}</td>
            <td>{{ $point->status }}</td>
        </tr>
        @endforeach
    </table>
@endsection