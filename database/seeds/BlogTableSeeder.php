<?php

use Illuminate\Database\Seeder;
use App\Blog;
class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::insert([
        	['blog_category_id'=>'1',
        	'name'=>'blog1',
        	'description'=>'its a blog',
            'user_id'=>1,
        	'status'=>1]
        	]);
    }
}
