<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function kategori()
    {
        echo "Kategori Produk: <br>";
        echo "1. Makanan <br>";
        echo "2. Minuman";
    }

    public function makanan()
    {
        echo "Daftar Makanan: <br>";
        echo "1. Martabak <br>";
        echo "2. Kebab <br>";
        echo "3. Burger";
    }

    public function minuman()
    {
        echo "Daftar Minuman: <br>";
        echo "1. Teh <br>";
        echo "2. Kopi <br>";
        echo "3. Susu";
    }
}
