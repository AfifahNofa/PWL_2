<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    // protected $keyType = 'int';
    protected $fillable = [
        'nim',
        'nama',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'kelas_id',
    ];

    public function kelas(){
        return $this->belongsTo(kelas::class);
    }
}
