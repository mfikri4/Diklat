<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuotaDiklat extends Model
{
    use HasFactory;

    protected $table = 'info_kuota_diklat';

    protected $fillable = [
        'name',
        'periode',
        'jadwal_diklat',
        'sisa_kuota',
        'status',
    ];


    public static $rules = [
        'name'              => 'required',
        'periode'           => 'required',        
        'jadwal_diklat'     => 'required',
        'sisa_kuota'        => 'required',
        'status'            => 'required'
    ];

}
