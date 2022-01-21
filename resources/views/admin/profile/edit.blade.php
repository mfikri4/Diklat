@extends('admin.app')
@section('content')
    <h3>Edit Profile</h3>
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
        <form action="{{ url('admin/profile/edit/' . $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value ="{{ $data->name }}">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value ="{{ $data->email }}">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control"><br>
            <td><img width="100px" src="{{ url($data->image) }}"></td>
            <br><br>
            <input type="submit" name="submit" class="btn btn-md btn-primary " value="Edit Profile">
            <a href="{{ url('admin') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>            
        </form>
    </div>
@endsection