<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petuga extends Model
{
    use HasFactory;
    protected $fillable = ([
        'username',
        'password',
        'nama_petugas',
        'level',
    ]);
}
