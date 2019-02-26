<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table="tasks";
    protected $fillable = ['task_category_id','user_id','name','notes','start_date','end_date','priority'];
    public $timestamps=true;

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function task_category(){
        return $this->belongsTo('App\TaskCategory','task_category_id');
    }

    public function tasks(){
        return $this->hasMany('App\TaskLog','task_id');
    }
}
