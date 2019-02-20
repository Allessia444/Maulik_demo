<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;
use App\ProjectCategory;

class ProjectCategoriesController extends Controller
{

    // List all project categories
    public function index()
    {
        $project_categories=ProjectCategory::all();
        return view('admin.project_categories.index',compact('project_categories'));
    }

    //Create the new project category
    public function create()
    {
        $parent=ProjectCategory::where('parent_id','=',NULL)->pluck('name','id');
        Former::populate($parent);
        return view('admin.project_categories.create',compact('parent'));
    }

    //Store the details of project category
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
            $project_categories = New ProjectCategory;
            $project_categories->parent_id = $request->get('parent_id');
            $project_categories->name = $request->get('name');
            $project_categories->lft = $request->get('lft');
            $project_categories->rgt = $request->get('rgt');
            $project_categories->depth = $request->get('depth');

           
            $project_categories->save();
            return redirect()->route('projectcategories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('projectcategories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        //
    }

    //Edit the project category
    public function edit($id)
    {
        $project_categories=ProjectCategory::find($id); 
        $parent=ProjectCategory::where('parent_id','=',NULL)->pluck('name','id');
        // Former::populate($parent);       
        Former::populate($project_categories);
        return view('admin.project_categories.edit',compact('project_categories','parent'));
    }

    //Update the details of project category
    public function update(Request $request, $id)
    {
        //Rules for validation
         $rules=['name' => 'required',
                'parent_id'=>'required',
                ];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    'parent_id.required' => 'Please select  user.',
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
            $project_categories = ProjectCategory::find($id);
            $project_categories->parent_id = $request->get('parent_id');
            $project_categories->name = $request->get('name');
            $project_categories->lft = $request->get('lft');
            $project_categories->rgt = $request->get('rgt');
            $project_categories->depth = $request->get('depth');
            $project_categories->save();
            return redirect()->route('projectcategories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('projectcategories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Delete the project category
    public function destroy($id)
    {
        $project_categories = ProjectCategory::find($id);
        $project_categories->delete();
        return redirect()->route('projectcategories.index');
    }
}
