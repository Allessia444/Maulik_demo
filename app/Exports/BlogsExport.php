<?php

namespace App\Exports;

use App\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithColumnFormatting ;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PHPExcel_Style_Fill;
class BlogsExport implements FromCollection,WithEvents,ShouldAutoSize,WithHeadings
{
    use Exportable;
    public $i;
    public function __construct(){
        $this->i=0;
    }
    public function registerEvents(): array
    {
        $blogs = Blog::all()->count();
        // $j=0;
        // for ($i=0; $i <$blogs ; $i++) { 
        //     if($j<3){
        //         $first_half[]=$i;
        //     }
        //     else{
        //         $second_half=$i;
        //     }
        //     $j++;
        //     if($j==6){
        //         $j=0;
        //     }
        // }
        // dd($first_half);
        $blog_count=((int)($blogs/2));
        $first_half=($blogs - $blog_count)+1;
        $second_half=$first_half+1;
        // dd($blog_count);

                
        return [

        AfterSheet::class => function(AfterSheet $event) use($blogs,$first_half,$second_half) {
            $event->sheet->getProtection()->setPassword('1234');
            $event->sheet->getProtection()->setSheet(true);

            $event->sheet->getStyle('E1:E'.$blogs)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
            $event->sheet->getStyle('B2:B'. $first_half)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FFFF'); 
            $event->sheet->getStyle('C2:C'. $first_half)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FFFF'); 
            $event->sheet->getStyle('D2:D'. $first_half)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FFFF'); 

            $event->sheet->getStyle('B'.$second_half.':B'.($blogs+1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFB6C1'); 
            $event->sheet->getStyle('C'.$second_half.':C'.($blogs+1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFB6C1'); 
            $event->sheet->getStyle('D'.$second_half.':D'.($blogs+1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFB6C1');


        },
        ];
    }
    public function collection()
    {       $blogs = Blog::all();

            return $array = $blogs->map(function ($b, $key) {

            return [
                'id' => $b->id,
                'user_id'=>$b->users->first_name,
                'blog_category_id' => $b->blog_category->name,
                'name'=>$b->name,
                'description'=>$b->description,
            ];
        });
    }
    public function headings(): array
    {
        return [
        '#',
        'User Name',
        'Blog Category',
        'Name',
        'Description',
        
        ];
    }
    	// public function view(): View
    	// {
    	// 	$blog=Blog::all();            
    	// return view('exports.blogs',compact('blog'));
    	// }
}
