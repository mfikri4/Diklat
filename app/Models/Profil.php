<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'info_profil';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'nik',
        'no_hp',
        'name_ibu',
        'tempat',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'kewarganegaraan',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat',
        'rt',
        'rw',
        'kode_pos',
        'file_foto',
        'file_ktp',
        'file_ijazah_darat',
        'file_akte',
        'name_sekolah',
    ];

    public static $rules = [

        'name'                  => 'required',
        'username'              => 'required',
        'email'                 => 'required',
        'password'              => 'required',
        'nik'                   => 'required',
        'no_hp'                 => 'required',
        'name_ibu'              => 'required',
        'tempat'                => 'required',
        'tanggal_lahir'         => 'required',
        'jenis_kelamin'         => 'required',
        'pendidikan_terakhir'   => 'required',
        'kewarganegaraan'       => 'required',
        'provinsi'              => 'required',
        'kabupaten'             => 'required',
        'kecamatan'             => 'required',
        'kelurahan'             => 'required',
        'alamat'                => 'required',
        'rt'                    => 'required',
        'rw'                    => 'required',
        'kode_pos'              => 'required',
        'file_foto'             => 'required',
        'file_ktp'              => 'required',
        'file_ijazah_darat'     => 'required',
        'file_akte'             => 'required',
        'name_sekolah'          => 'required'
    ]; 
}
