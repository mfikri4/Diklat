<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDiklat extends Model
{
    use HasFactory;

    protected $table = 'info_jenis_diklat';

    protected $fillable = [
        'title',
        'content',
        'status',
    ];


    public static $rules = [
        'title'             => 'required',
        'content'           => 'required',
        'status'            => 'required'
    ];
}
