<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class TaskCategory extends Model
{
    protected $table="task_categories";
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
    public function tasks(){
        return $this->hasone('App\Tasks','task_category_id');
    }
}
