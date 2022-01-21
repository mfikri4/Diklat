@extends('admin.app')
@section('content')
<h3>Akun Profil</h3>
<hr>
@if (Session::has('status'))
<div class="alert alert-warning" role="alert">
    {{ Session::get('status') }}
</div>
@endif
<a href="{{ url('admin/akun-profil/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i>Tambah Data</a>
<table class="table table-bordered">
    <thead class="bg-primary text-light">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>NIK</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Alamat</th>
            <th>ACTION</th>
        </tr>
    </thead>
    @foreach ($data as $cat)
    <tr>
        <td class="px-6 py-3 leading-6 text-center whitespace-nowrap">{{ ++$i }}</td>
        <td>{{$cat->name}}</td>
        <td>{{$cat->username}}</td>
        <td>{{$cat->email}}</td>
        <td>{{$cat->nik}}</td>
        <td>{{$cat->tempat}}, {{$cat->tanggal_lahir}}</td>
        <td>{{$cat->alamat}}</td>
        <td>
            <a href="{{ url('admin/akun-profil/edit/'.$cat->id) }}" class="btn btn-primary btn-md"><i
                    class="far fa-edit"></i>Edit</a>
            <a href="{{ url('admin/akun-profil/delete/'.$cat->id) }}" class="btn btn-danger btn-md"><i
                    class="far fa-trash"></i>Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection