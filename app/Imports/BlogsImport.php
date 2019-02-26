<?php

namespace App\Imports;

use App\Blog;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\BlogCategory;
class BlogsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data=BlogCategory::where('name','=',$row['category'])->count();
        $parent=BlogCategory::whereNull('parent_id')->where('name','=',$row['parent_category'])->count();
        $parent_category=NULL;
        if($parent > 0){
            $parent_category=BlogCategory::where('name','=',$row['parent_category'])->first();
        }
        else{
            if($row['parent_category']!=Null){
                $parent_category=New BlogCategory;
                $parent_category->name=$row['parent_category'];
                $parent_category->save();    
            }
            
        }
        if($data > 0){
            $blog_category=BlogCategory::where('name','=',$row['category'])->first();
        }
        else{
            $blog_category=new BlogCategory;
            $blog_category->name=$row['category'];
            if($parent_category != NULL){
                $blog_category->parent_id=$parent_category->id;
            }
            $blog_category->save();
        }

        return new Blog([
            'user_id'=>Auth::user()->id,
            'blog_category_id'=>$blog_category->id,
            'name'=>$row['name'],
            'description'=>$row['description'],
        ]);
    }
}
