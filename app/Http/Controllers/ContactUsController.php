<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact()
    {
        return 'Kontak Kami<br>
        <ul>
        <li>Alamat  : Jl. Gilingrejo No. 10 Salatiga, Jawa Tengah 50743</li>
        <li>Telepon : (+62) 298 6031005</li>
        <li>Email   : cs@educastudio.com</li>
        <li>Whattsap: 0813-2384-4339</li>
        </ul>';
    }

}