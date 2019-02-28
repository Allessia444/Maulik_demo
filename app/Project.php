<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Project extends Model
{
     protected $table="projects";
    protected $fillable = ['user_id','name','slug','confirm_hrs'];
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

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

}
