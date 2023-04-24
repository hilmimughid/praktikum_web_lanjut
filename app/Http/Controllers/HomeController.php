<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [
            "coffees" => Coffee::all(),
            "americano" => Coffee::find(1),
            "cappuccino" => Coffee::find(2),
            "esspresso" => Coffee::find(3),
            "latte" => Coffee::find(4),
            "macchiato" => Coffee::find(5),
            "mocha" => Coffee::find(6)
        ]);
    }
}
