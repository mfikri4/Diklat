@extends('admin.app')
@section('content')
<h3>Info Kuota Diklat</h3>
<hr>
@if (Session::has('status'))
<div class="alert alert-warning" role="alert">
    {{ Session::get('status') }}
</div>
@endif
<a href="{{ url('admin/kuota-diklat/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i>Tambah Data</a>
<table class="table table-bordered">
    <thead class="bg-primary text-light">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Periode</th>
            <th>Jadwal Diklat</th>
            <th>Sisa Kuota</th>
            <th>Status</th>
            <th>ACTION</th>
        </tr>
    </thead>
    @foreach ($data as $cat)
    <tr>
        <td class="px-6 py-3 leading-6 text-center whitespace-nowrap">{{ ++$i }}</td>
        <td>{{$cat->name}}</td>
        <td>{{$cat->periode}}</td>
        <td>{{$cat->jadwal_diklat}}</td>
        <td>{{$cat->sisa_kuota}}</td>
        <td>{{$cat->status}}</td>
        <td>
            <a href="{{ url('admin/kuota-diklat/edit/'.$cat->id) }}" class="btn btn-primary btn-md"><i
                    class="far fa-edit"></i>Edit</a>
            <a href="{{ url('admin/kuota-diklat/delete/'.$cat->id) }}" class="btn btn-danger btn-md"><i
                    class="far fa-trash"></i>Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection