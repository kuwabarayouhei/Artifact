<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theft_car extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'model',
    'number',
    'color',
    'location',
    'time',
    'situation',
    'information',
];
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()   
    {
        return $this->hasMany('App\Comment');   
    }

     public function images()
    {
        // Itemはたくさんの写真を持つ
        return $this->hasMany('App\Theft_carImage');
    }
}
