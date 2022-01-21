@extends('admin.app')
@section('content')
<h3>Jenis Diklat</h3>
<hr>
@if (Session::has('status'))
<div class="alert alert-warning" role="alert">
    {{ Session::get('status') }}
</div>
@endif
<a href="{{ url('admin/jenis-diklat/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i>Tambah Data</a>
<table class="table table-bordered">
    <thead class="bg-primary text-light">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Status</th>
            <th>Content</th>
            <th>ACTION</th>
        </tr>
    </thead>
    @foreach ($data as $cat)
    <tr>
        <td class="px-6 py-3 leading-6 text-center whitespace-nowrap">{{ ++$i }}</td>
        <td>{{$cat->title}}</td>
        <td>{{$cat->status}}</td>
        <td>{{$cat->content}}</td>
        <td>
            <a href="{{ url('admin/jenis-diklat/edit/'.$cat->id) }}" class="btn btn-primary btn-md"><i
                    class="far fa-edit"></i>Edit</a>
            <a href="{{ url('admin/jenis-diklat/delete/'.$cat->id) }}" class="btn btn-danger btn-md"><i
                    class="far fa-trash"></i>Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection