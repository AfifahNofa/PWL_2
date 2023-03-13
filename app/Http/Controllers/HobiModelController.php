<?php

namespace App\Http\Controllers;

use App\Models\HobiModel;
use Illuminate\Http\Request;

class HobiModelController extends Controller
{
    public function index(){
        $hobi = HobiModel::all();
        return view('hobi')
                ->with('hb', $hobi);
    }
}
