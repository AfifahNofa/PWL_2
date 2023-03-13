<?php

namespace App\Http\Controllers;

use App\Models\MataKuliahModel;
use Illuminate\Http\Request;

class MataKuliahModelController extends Controller
{
    public function index(){
        $matkul = MataKuliahModel::all();
        return view('matkul')
                ->with('mk', $matkul);
    }
}
