<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class UserProfile extends Model
{
	protected $table="users_profile";
    protected $fillable = [
        'user_id','first_name','last_name','photo','mobile','phone','address1','address2','city','state','country','zipcode','dob','gender','marrital_status','pan_number','management_level','join_date','attach','google','facebook','website','skype','linkedin','twitter'
    ];
    public $timestamps=true;

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
     


    public function setphotoAttribute($file) {
        $source_path = upload_tmp_path($file);

        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'photo');
            Image::make($source_path)->resize(400,200)->save($source_path);
            upload_move($file,'photo','front');
            Image::make($source_path)->resize(50,50)->save($source_path);
            upload_move($file,'photo','thumb');
            @unlink($source_path);
        //$this->deleteFile();
        }
            $this->attributes['photo'] = $file;
            if ($file == '') 
            {
            //$this->deleteFile();
            $this->attributes['photo'] = "";
            }
    }

    public function profile_photo_url($type='original') 
    {
        if (!empty($this->photo))
            return upload_url($this->photo,'photo',$type);
        elseif (!empty($this->photo) && file_exists(tmp_path($this->photo)))
            return tmp_url($this->$photo);
        else
            return asset('images/graduate.png');
    }


    public function setattachAttribute($file) {
        $source_path = upload_tmp_path($file);

        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'attach');
            Image::make($source_path)->resize(400,200)->save($source_path);

            @unlink($source_path);
        //$this->deleteFile();
        }
            $this->attributes['attach'] = $file;
            if ($file == '') 
            {
            //$this->deleteFile();
            $this->attributes['attach'] = "";
            }
    }

    public function attach_url($type='original') 
    {
        if (!empty($this->attach))
            return upload_url($this->attach,'attach',$type);
        elseif (!empty($this->attach) && file_exists(tmp_path($this->attach)))
            return tmp_url($this->$attach);
        else
            return asset('images/graduate.png');
    }

    
}
