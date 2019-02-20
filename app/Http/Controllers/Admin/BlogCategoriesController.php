<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use Validator;
use Former;
class BlogCategoriesController extends Controller
{
   
    //List all blog categories
    public function index()
    {
        $blog_categories=BlogCategory::all();
        return view('admin.blog_categories.index',compact('blog_categories'));
    }

    //Create the new blog category
    public function create()
    {
        $parent=BlogCategory::where('parent_id','=',NULL)->pluck('name','id');
        Former::populate($parent);
        return view('admin.blog_categories.create',compact('parent'));
    }

    //Store the detail of blog category
    public function store(Request $request)
    {
        //Rules for validation
         $rules=['name' => 'required',
                // 'parent_id'=>'required',
                ];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    // 'parent_id.required' => 'Please select  user.',
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
            $blog_categories = New BlogCategory;
            $blog_categories->parent_id = $request->get('parent_id');
            $blog_categories->name = $request->get('name');

           
            $blog_categories->save();
            return redirect()->route('blogcategories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('blogcategories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        //
    }

    //Edit the project category
    public function edit($id)
    {
        $blog_categories=BlogCategory::find($id); 
        $parent=BlogCategory::where('parent_id','=',NULL)->pluck('name','id');
        // Former::populate($parent);       
        Former::populate($blog_categories);
        return view('admin.blog_categories.edit',compact('blog_categories','parent'));
    }

    //Update the details of project category
    public function update(Request $request, $id)
    {
        //Rules for validation
         $rules=['name' => 'required',
                // 'parent_id'=>'required',
                ];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    // 'parent_id.required' => 'Please select  user.',
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
            $blog_categories = BlogCategory::find($id);
            $blog_categories->parent_id = $request->get('parent_id');
            $blog_categories->name = $request->get('name');

           
            $blog_categories->save();
            return redirect()->route('blogcategories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('blogcategories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //Delete the project category
    public function destroy($id)
    {
        $blog_categories = BlogCategory::find($id);
        $blog_categories->delete();
        return redirect()->route('blogcategories.index');
    }
}
