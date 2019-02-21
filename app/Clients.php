<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table="clients";
    protected $fillable = ['industry_id','name','logo','website','email','phone','fax','address1','address2','city','state','country','zipcode'];
    public $timestamps=true;

    public function setlogoAttribute($file) {
        $source_path = upload_tmp_path($file);

        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'logo');
            @unlink($source_path);
        }
            $this->attributes['logo'] = $file;
            if ($file == '') 
            {
            //$this->deleteFile();
            $this->attributes['logo'] = "";
            }
    }

    public function photo_url($type='original') 
    {
        if (!empty($this->logo))
            return upload_url($this->logo,'logo',$type);
        elseif (!empty($this->logo) && file_exists(tmp_path($this->logo)))
            return tmp_url($this->$logo);
        else
            return asset('images/graduate.png');
    }

        public function industrys(){
        return $this->belongsTo('App\Industrys','industry_id');
    }
}
