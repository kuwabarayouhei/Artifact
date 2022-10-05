<?php

namespace App\Http\Controllers;

use App\Theft_car;
use App\Http\Requests\PostRequest;

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
    
    public function create()
    {
        return view('theft_cars/create');
    }
    
    public function store(Theft_car $theft_car,PostRequest $request )
    {
        $input = $request['theft_car'];
        $theft_car->fill($input)->save();
        return redirect('/theft_cars/' . $theft_car->id);
    }
    
}
?>