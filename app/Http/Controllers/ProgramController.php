<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //
    public function program()
    {
        echo "Daftar Program: <br>";
        echo "1. Karir <br>";
        echo "2. Magang";
    }

    public function karir()
    {
        echo "Daftar Jabatan: <br>";
        echo "1. Manajer <br>";
        echo "2. Senior Chef";
    }

    public function magang()
    {
        echo "Daftar Jabatan: <br>";
        echo "1. Staf Kasir <br>";
        echo "2. Junior Chef";
    }
}
