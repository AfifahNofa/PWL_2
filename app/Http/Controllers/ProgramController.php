<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
        return "
        <ul>
        <li><a href=>https://www.educastudio.com/program/karir</a></li>
        <li><a href=>https://www.educastudio.com/program/magang</a></li>
        <li><a href=>https://www.educastudio.com/program/kunjungan-industri</a></li>
        </ul>
        ";
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