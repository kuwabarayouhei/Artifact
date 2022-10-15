<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = [
    'body',
    'theft_car_id',
    ];
    
    public function theft_car()
    {
        return $this->belongsTo('App\Theft_car');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
