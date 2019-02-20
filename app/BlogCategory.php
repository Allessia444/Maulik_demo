<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class BlogCategory extends Model
{
    protected $table="blog_categories";
    protected $fillable = ['parent_id','name','slug'];
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

    public function blogcategory(){
        return $this->belongsTo('App\BlogCategory','parent_id');
    }  

    public function blogs(){
        return $this->hasone('App\Blogs','blog_category_id');
    }
}
