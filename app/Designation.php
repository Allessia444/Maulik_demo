<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
	protected $table="designation";
    protected $fillable = [
        'name'
    ];
    public $timestamps=true;

    public function users(){
    	return $this->hasone('App\User','designation_id');
    }
}
