@extends('admin.app')
@section('content')
    <h3>Create Info Pendaftaran Diklat</h3>
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
        <form action="{{ url('admin/kuota-diklat/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
            <label for="periode">Periode</label>
            <input type="number" name="periode" class="form-control">
            <label for="jadwal_diklat">Jadwal Diklat</label>
            <input type="date" name="jadwal_diklat" class="form-control">
            <label for="sisa_kuota">Jumlah Kuota</label>
            <input type="text" name="sisa_kuota" class="form-control">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select>            
            
            <input type="submit" name="submit" class="btn btn-md btn-primary " value="Tambah Data">
            <a href="{{ url('admin/kuota-diklat') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>            
        </form>
    </div>
@endsection