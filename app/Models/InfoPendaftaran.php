<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'info_pendaftaran';

    protected $fillable = [
        'title',
        'file',
        'content',
        'status',
    ];


    public static $rules = [
        'title'        => 'required',
        'file'         => 'required',
        'content'      => 'required',
        'status'       => 'required'
    ];
}
