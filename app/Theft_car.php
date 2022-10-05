<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theft_car extends Model
{
    
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
}
