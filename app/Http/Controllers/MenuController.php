<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function menu()
    {
        return view('menu', [
            "coffees" => Coffee::all()
        ]);
    }
}
