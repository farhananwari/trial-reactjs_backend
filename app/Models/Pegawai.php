<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais'; // Adjust this if your table name is different

    protected $fillable = ['nama', 'status_pegawai', 'gaji'];
}
