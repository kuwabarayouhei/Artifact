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
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
         //updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()   
    {
        return $this->hasMany('App\Comment');   
    }
}
