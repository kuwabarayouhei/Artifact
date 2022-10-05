<?php

namespace App\Http\Controllers;

use App\Theft_car;
use Illuminate\Http\Request;


class Theft_carController extends Controller
{
    public function index(Theft_car $theft_car)
    {
        return view('theft_cars/index')->with(['theft_cars' => $theft_car->getPaginateByLimit()]);  
    }

    public function show(Theft_car $theft_car)
    {
        return view('theft_cars/show')->with(['theft_car' => $theft_car]);
    }
    
}
