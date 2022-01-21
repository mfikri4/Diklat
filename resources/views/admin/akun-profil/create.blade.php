@extends('admin.app')
@section('content')
    <h3>Create Akun Profil Diklat</h3>
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
        <form action="{{ url('admin/akun-profil/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
            <label for="password">Confirm Password</label>
            <input type="password" name="password" class="form-control">

            <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control">
            <label for="name_ibu">Name Ibu</label>
            <input type="text" name="name_ibu" class="form-control">
            <label for="tempat">Tempat Tinggal</label>
            <input type="text" name="tempat" class="form-control">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" class="form-control">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <input type="text" name="pendidikan_terakhir" class="form-control">
            <label for="kewarganegaraan">Kewarganegaraan</label>
            <input type="text" name="kewarganegaraan" class="form-control">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" class="form-control">            
            <label for="kabupaten">Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control">
            <label for="kelurahan">Kelurahan</label>
            <input type="text" name="kelurahan" class="form-control">
            <label for="alamat">Alamat</label><!-- --><!-- --><!-- --><!-- --><!-- --><!-- -->
            <input type="text" name="alamat" class="form-control"><!-- --><!-- --><!-- --><!-- -->
            <label for="rt">RT</label>
            <input type="text" name="rt" class="form-control">
            <label for="rw">RW</label>
            <input type="text" name="rw" class="form-control">
            <label for="kode_pos">Kode Pos</label>
            <input type="text" name="kode_pos" class="form-control">
            <label for="file_foto">File Foto</label>
            <input type="file" name="file_foto" class="form-control">
            <label for="file_ktp">File KTP</label>
            <input type="file" name="file_ktp" class="form-control">
            <label for="file_ijazah_darat">File Ijazah Darat</label>
            <input type="file" name="file_ijazah_darat" class="form-control">
            <label for="file_akte">File Akte</label>
            <input type="file" name="file_akte" class="form-control">
            <label for="name_sekolah">Nama Sekolah</label>
            <input type="text" name="name_sekolah" class="form-control">

            <input type="submit" name="submit" class="btn btn-md btn-primary " value="Tambah Data">
            <a href="{{ url('admin/akun-profil') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>            
        </form>
    </div>
@endsection