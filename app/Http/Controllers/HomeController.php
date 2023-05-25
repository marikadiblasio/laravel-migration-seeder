<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;

class HomeController extends Controller
{
    public function home(){
        $today=now();
        $trains = Train::whereDate('departure_time', '=' , $today)->orderBy('departure_time')->get();
        return view('home', compact('trains'));
    }
}
