<?php

namespace App\Exports;

use App\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class BlogsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    	
    	public function view(): View
    	{
    		$blog=Blog::all();
    		
    	return view('exports.blogs',compact('blog'));
    	}
                    
 
    
}
