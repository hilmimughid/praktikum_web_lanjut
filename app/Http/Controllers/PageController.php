<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        echo "Selamat Datang";
    }

    public function about()
    {
        echo "Nama: Hilmi Mughid <br>";
        echo "NIM: 2141720081";
    }
    public function articles($id)
    {
        echo "Halaman Artikel dengan ID ".$id;
    }
}
