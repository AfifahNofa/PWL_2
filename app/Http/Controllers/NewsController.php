<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = ['berita' => ' <li><a href="https://www.educastudio.com/news">https://www.educastudio.com/news</a></a></li>
            <li><a href="/news/educa-studio-berbagi-untuk-warga-sekitarterdampak-covid-19">https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitarterdampak-covid-19</a></li>'];
        return view('Praktikum1.news', $data);
    }

    // public function display($param)
    // {
    //     return view('p1-js2.news', ['idNews' => $param]);
    // }
};