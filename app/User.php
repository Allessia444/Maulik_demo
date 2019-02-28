<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone','department_id','designation_id','team_lead','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps=true;

    public function user_profile(){
        return $this->hasone('App\UserProfile','user_id');
    }
    public function projects(){
        return $this->hasMany('App\Project','user_id');

    }

    public function departments(){
        return $this->belongsTo('App\Department','department_id');

    }

    public function designations(){
        return $this->belongsTo('App\Designation','designation_id');
    }

    public function blogs(){
        return $this->hasone('App\Blog','user_id');
        
    }

    public function tasks(){
        return $this->hasone('App\Tasks','user_id');   
    }

    public function task_logs(){
        return $this->hasone('App\TaskLog','user');   
    }


}
