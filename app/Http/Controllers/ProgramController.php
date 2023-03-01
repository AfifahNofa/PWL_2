<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
        return view('Praktikum1.program');
    }

    public function kar()
    {
        return "Karir";
    }

    public function mag()
    {
        return "Magang";
    }

    public function kunjIndustri()
    {
        return "Kunjungan Industri";
    }
}