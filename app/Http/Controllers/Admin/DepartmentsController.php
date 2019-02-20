<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use Validator;
use Former;
class DepartmentsController extends Controller
{
   //List all departments
    public function index()
    {
         $departments = Department::all();
        return view('admin.departments.index',compact('departments'));
    }
    //Create new department
    public function create()
    {
        return view('admin.departments.create');
    }
    //Store the new department
    public function store(Request $request)
    {
        //Rules for validation       
        $rules=[
            'name' => 'required',
        ];
        // Messages for validation
        $messages=[
            'name.required' => 'Please enter  name.',
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
            $department = New Department;
            $department->name = $request->get('name');
            $department->save();
            
            return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        //
    }
    //Edit the department
    public function edit($id)
    {
        $departments=Department::find($id);
        Former::populate($departments);
        return view('admin.departments.edit',compact('departments'));
    }
    //Update the details of department
    public function update(Request $request, $id)
    {
        //Rules for validation
         $rules=[
            'name' => 'required',
           
        ];
        // Messages for validation
        $messages=[
            'name.required' => 'Please enter  name.',
            
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
            $department = Department::find($id);
            $department->name = $request->get('name');
            $department->save();
            
            return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Delete the department
    public function destroy($id)
    {
        $department=Department::find($id);
        $department->delete();
        return redirect()->route('departments.index');
    }
}
