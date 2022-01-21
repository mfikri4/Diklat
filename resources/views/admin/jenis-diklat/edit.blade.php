@extends('admin.app')
@section('content')
    <h3>Edit Jenis Diklat</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors-> any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('admin/jenis-diklat/edit/' . $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" value="{{ $data->title }}" name="title" class="form-control">
            <label for="file">File</label>
            <input type="file" name="file" class="form-control">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                    <option value="0" {{( 0 == $data->status) ? 'selected' : ''}}>
                        Tidak Publish</option>        
                    <option value="1" {{( 1 == $data->status) ? 'selected' : ''}}>
                        Publish</option>
            </select>
   
            <label for="status">Content</label>
            <textarea class="form-control" name="content" id="content" cols="50" rows="10">{{$data->content}}</textarea><br>            

            <input type="submit" name="submit" class="btn btn-md btn-primary " value="Edit Data">
            <a href="{{ url('admin/jenis-diklat') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>            
        </form>
    </div>
@endsection