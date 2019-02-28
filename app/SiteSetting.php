<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table="site_settings";
    protected $fillable = ['title','email','phone1','phone2','copy_right','visitors'];
    public $timestamps=true;
}
