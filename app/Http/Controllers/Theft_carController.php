<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Storage;
use App\Theft_car;
use App\Theft_carImage;

class Theft_carController extends Controller
{
    public function index(Theft_car $theft_car)
    {   
        //$theft_car=$theft_car->getPaginateByLimit();
        $theft_car_image = $theft_car::with('images');  // リレーション先を引っ張る
        return view('theft_cars/index')->with(['theft_cars'=>$theft_car_image->orderBy('updated_at', 'DESC')->paginate(5)]); 
        
        //return view('theft_cars/index')->with(['theft_cars' => $theft_car->getPaginateByLimit()]);  
    }

    public function show(Theft_car $theft_car)
    {   
        return view('theft_cars/show')->with(['theft_car' => $theft_car]);
    }
    
    public function create()
    {
        return view('theft_cars/create');
    }
    
    public function store(Theft_car $theft_car, PostRequest $request )
    {
        $input = $request['theft_car'];
        $theft_car->fill($input)->save();
        //($theft_car);
   
        // imageテーブルには複数のpathを保存
        foreach ($request->file('files') as $index=>$file) {
        $path = Storage::disk('s3')->putFile('myprefix', $file['image'], 'public');
        $theft_car->images()->create(['path' => Storage::disk('s3')->url($path)]);
        }
        
        return redirect('/theft_cars/' . $theft_car->id);
    }
    
    public function delete(Theft_car $theft_car)
    {
        $theft_car->delete();
        return redirect('/');
    }
    
}
?>