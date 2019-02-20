<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class ProjectCategory extends Model
{
    protected $table="project_categories";
    protected $fillable = ['parent_id','name','slug','lft','rgt','depth'];
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

    public function category(){
        return $this->belongsTo('App\ProjectCategory','parent_id');
    }  
}
