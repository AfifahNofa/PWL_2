<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliahModel extends Model
{
    use HasFactory;

    protected $table = 'matkul';
    public $timestamps = false;
    // protected $primaryKey = 'kode';
    // protected $keyType = 'string';
    protected $fillable = [
        'kode',
        'nama',
        'dosen',
        'sks',
    ];
}
