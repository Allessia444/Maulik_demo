<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Industrys extends Model
{
    protected $table="industrys";
    protected $fillable = ['name','slug'];
    public $timestamps=true;

     use Sluggable;

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function clients(){
        return $this->hasMany('App\Clients','industry_id');
    }
}
