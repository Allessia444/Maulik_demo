<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;
use App\Blog;
use App\BlogCategory;
use Auth;
use URL;
use App\Imports\BlogsImport;
use App\Exports\BlogsExport;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
class BlogsController extends Controller
{  

    //List all blogs
    public function index()
    {
        if(Auth::user()->role=="admin"){
            $blogs=Blog::all();
            return view('admin.blogs.admin_index',compact('blogs'));            
        }
        else{
            $blogs=Blog::where('user_id','=',Auth::user()->id)->get();
            return view('admin.blogs.user_index',compact('blogs'));               
        }
    }

    //List guset user blogs
    public function guest_user(){
        $id=Input::get('slug');
        if($id!=Null){
            $blog_category=BlogCategory::where('slug','=',$id)->first();
            $blogs=Blog::where('blog_category_id','=',$blog_category->id)->get();
            // return view('admin.blogs.index',)
        }
        else{
            $blogs=Blog::all();    
        }
        $blog_categories=BlogCategory::all();
        return view('admin.blogs.index',compact('blogs','blog_categories'));                  
    }
    //Create the new blog
    public function create()
    {
        $blog_categories=BlogCategory::all()->pluck('name','id');
        Former::populate($blog_categories);
        return view('admin.blogs.create',compact('blog_categories'));
    }

    //Store the new blog data
    public function store(Request $request)
    {
         //Rules for validation
         $rules=['name' => 'required',
                 'blog_category_id'=>'required',
                 'description'=>'required',
                ];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    'blog_category_id.required' => 'Please select blog category.',
                    'description.required'=>'Please enter the description'
                    ];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {   
            $blog = New Blog;
            $blog->blog_category_id = $request->get('blog_category_id');
            $blog->name = $request->get('name');
            $blog->photo=$request->get('photo');
            $blog->status=$request->get('status');
            $blog->description=$request->get('description');
            $blog->user_id=Auth::user()->id;
            $blog->save();
            return redirect()->route('blogs.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //Show Admin blog details
    public function show($id)
    {
        $key = Input::get('from');
        $blogs=Blog::find($id);
        return view('admin.blogs.show',compact('blogs','key'));
    }

    //Edit the blogs
    public function edit($id)
    {
        $blog_categories=BlogCategory::all()->pluck('name','id');
        $blogs=Blog::find($id);
        Former::populate($blogs);
        return view('admin.blogs.edit',compact('blogs','blog_categories'));
    }

    //Update the blogs details
    public function update(Request $request, $id)
    {
         //Rules for validation
         $rules=['name' => 'required',
                 'blog_category_id'=>'required',
                 'description'=>'required',
                ];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    'blog_category_id.required' => 'Please select blog category.',
                    'description.required'=>'Please enter the description'
                    ];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {   
            $blog = Blog::find($id);
            $blog->blog_category_id = $request->get('blog_category_id');
            $blog->name = $request->get('name');
            if($request->get('photo')){
                $blog->photo=$request->get('photo');    
            }
            $blog->status=$request->get('status');
            $blog->description=$request->get('description');
            $blog->user_id=Auth::user()->id;
            $blog->save();
            return redirect()->route('blogs.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //Delete the blog
    public function destroy($id)
    {
        $blog=Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index');
    }

    //Show the front-end blog details
    public function blog_details($id){
        $blog=Blog::find($id);
        $id=Input::get('slug');
        if($id!=Null){
            $blog_category=BlogCategory::where('slug','=',$id)->first();
            $blogs=Blog::where('blog_category_id','=',$blog_category->id)->get();
        }
        else{
            $blogs=Blog::all();    
        }
        $blog_categories=BlogCategory::all();
        return view('admin.blogs.blog_details',compact('blog','blogs','blog_categories'));
    }

    //Show user blog details
    public function user_blog_details($id){
        $blogs=Blog::find($id);

        return view('admin.blogs.user_blog_details',compact('blogs'));
    }
    //Import the file data
    public function import(Request $request) 
    {
        $file=public_path().'/tmp/'.$request->get('file');
         Excel::import(new BlogsImport, $file);
         return redirect()->route('blogs.index');
    }
    //Export blog data
    public function export() 
    {
         return Excel::download(new BlogsExport, 'blogs.xlsx');
    }
}
