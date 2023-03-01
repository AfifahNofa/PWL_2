<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about(){
        return view('Praktikum1.about-us');
    }
}
