<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact()
    {
        return view('Praktikum1.contact-us');
    }

}