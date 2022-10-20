<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theft_carImage extends Model
{
    protected $fillable = ['theft_car_id', 'path'];
    
    public function theft_car()
    {
        return $this->belongsTo('App\Theft_car');
    }
}
