@extends('layouts.admin')

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
            <a class="btn btn-primary" href="{{ route('admin.create') }}"> Tambah Kegiatan</a>
            {{-- <a class="btn btn-success" href="{{ route('point.index') }}"> Lihat Point</a> --}}
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

        @foreach ($admins as $admin)
        <tr>
            {{-- <td>{{ $admin->id }}</td> --}}
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->kegiatan }}</td>
            <td>{{ $admin->kendala }}</td>
            <td>{{ $admin->status }}</td>
            <td>{{ $admin->tanggal }}</td>
            <td>
                <form action="{{ route('admin.destroy',$admin->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('admin.show',$admin->id) }}">Detail</a>
    
                    <a class="btn btn-primary" href="{{ route('admin.edit',$admin->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection