<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaModel extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    public $timestamps = false;
    // protected $primaryKey = 'id';
    // protected $keyType = 'string';
    protected $fillable = [
        'nama',
        'ttl',
        'status',
        'hobi',
    ];
}
