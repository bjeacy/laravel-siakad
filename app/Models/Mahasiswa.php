<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = ['nim', 'nama', 'prodi', 'email', 'nohp'];

    protected $hidden = ['created_at', 'updated_at'];
}
