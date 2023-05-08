<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMatakuliah extends Model
{
    use HasFactory;

    protected $table='matakuliah'; //mendefinisikan bahwa model ini terkait dengan tabel kelas
    protected $fillable =[
        'nilai',
    ];
    public function mahasiswa(){
        return $this->belongsTo(MahasiswaModel::class, 'mahasiswa_id', 'id');
    }

    public function matakuliah(){
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id', 'id');
    }
}
