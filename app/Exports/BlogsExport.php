<?php

namespace App\Exports;

use App\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class BlogsExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
        $objPHPExcel = new PHPExcel;
        $objSheet = $objPHPExcel->getActiveSheet();	
    	public function view(): View
    	{
    		$blog=Blog::all();
            // $blog->getSecurity()->setLockWindows(true);

    	return view('exports.blogs',compact('blog'));
    	}

          // $objPHPExcel->getSecurity()->setLockWindows(true);
          // $objPHPExcel->getSecurity()->setLockStructure(true);
          // $objPHPExcel->getSecurity()->setWorkbookPassword("password");

          // // Set password for readonly data
          // $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
          // $objPHPExcel->getActiveSheet()->getProtection()->setPassword("password");          
 
    
}
