<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $table="department";
    protected $fillable = [
        'name'
    ];
    public $timestamps=true;

    public function users(){
    	return $this->hasone('App\User','department_id');
    }
}
