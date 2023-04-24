<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodaySpecialController extends Controller
{
    public function todayspecial()
    {
        return view('today-special', [
            "coffees" => Coffee::all()
        ]);
    }
}
