<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projects;
use App\User;
use Validator;
use Former;

class ProjectsController extends Controller
{
   //List all projects
    public function index()
    {
        $projects=Projects::all();
        return view('admin.projects.index',compact('projects'));
    }
    //Create the new project
    public function create()
    {
        $users=User::where('role','=','user')->get()->pluck('first_name','id');
        return view('admin.projects.create',compact('users'));
    }
    //Store the details of project
    public function store(Request $request)
    {
        //Rules for validation
        $rules=['name' => 'required',
                'user_id'=>'required',
                'confirm_hrs'=>'required'];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    'user_id.required' => 'Please select  user.',
                    'confirm_hrs.required' => 'Please enter  hours.'];
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
            $projects = New Projects;
            $projects->user_id = $request->get('user_id');
            $projects->name = $request->get('name');
            $projects->confirm_hrs = $request->get('confirm_hrs');

           
            $projects->save();
            return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //Show perticular project details
    public function show($id)
    {
        $projects=Projects::find($id);
        return view('admin.projects.show',compact('projects'));
    }
    //Edit the project
    public function edit($id)
    {
        $projects=Projects::find($id);
        Former::populate($projects);
        $users=User::where('role','=','user')->get()->pluck('first_name','id');
        return view('admin.projects.edit',compact('projects','users'));
    }
    //Update the project details
    public function update(Request $request, $id)
    {
        //Rules for validation
         $rules=['name' => 'required',
                'user_id'=>'required',
                'confirm_hrs'=>'required'];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    'user_id.required' => 'Please select  user.',
                    'confirm_hrs.required' => 'Please enter  hours.'];
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
            $projects = Projects::find($id);
            $projects->user_id = $request->get('user_id');
            $projects->name = $request->get('name');
            $projects->slug="";
            $projects->confirm_hrs = $request->get('confirm_hrs');

           
            $projects->save();
            return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Delete the project
    public function destroy($id)
    {
        $projects = Projects::find($id);
        $projects->delete();
        return redirect()->route('projects.index');
    }
}
