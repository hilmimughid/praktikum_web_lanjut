<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function berita()
    {
        echo "Halaman Utama Berita";
    }

    public function detail($judul)
    {
        echo "Halaman Berita ".$judul;
    }
}
