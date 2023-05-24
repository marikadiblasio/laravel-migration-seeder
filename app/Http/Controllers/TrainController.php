<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;

class TrainController extends Controller
{
    public function home(){
        $trains = Train::all();
        return view('home', compact('trains'));
    }
}
