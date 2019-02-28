<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    protected $table="task_logs";
    protected $fillable = ['task_id','user','date','start_time','end_time ','spent_time','description','billable'];
    public $timestamps=true;

    public function users(){
        return $this->belongsTo('App\User','user');
    }

    public function tasks(){
        return $this->belongsTo('App\Task','task_id');
    }

    public function getDateAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }
    public function setDateAttribute($value)
    {
    	$this->attributes['date'] = date("Y-m-d", strtotime($value));
    }
}
