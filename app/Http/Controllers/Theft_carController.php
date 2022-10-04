<?php

namespace App\Http\Controllers;

use App\Theft_car;
use Illuminate\Http\Request;


class Theft_carController extends Controller
{
    public function index(Theft_car $theft_car)
    {
    return $theft_car->get();
    }
}
