<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
class Blogs extends Model
{
    protected $table="blogs";
    protected $fillable = ['blog_category_id','name','description','photo','user_id','status'
    ];
    public $timestamps=true;


    public function setphotoAttribute($file) {
        $source_path = upload_tmp_path($file);

        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'blog');
            Image::make($source_path)->resize(200,303)->save($source_path);
            upload_move($file,'blog','front');
            Image::make($source_path)->resize(690,388)->save($source_path);
            upload_move($file,'blog','thumb');
            @unlink($source_path);
        }
            $this->attributes['photo'] = $file;
            if ($file == '') 
            {
            //$this->deleteFile();
            $this->attributes['photo'] = "";
            }
    }

    public function blog_photo_url($type='original') 
    {
        if (!empty($this->photo))
            return upload_url($this->photo,'blog',$type);
        elseif (!empty($this->photo) && file_exists(tmp_path($this->photo)))
            return tmp_url($this->$photo);
        else
            return asset('images/graduate.png');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function blog_category(){
        return $this->belongsTo('App\BlogCategory','blog_category_id');
    }
}
