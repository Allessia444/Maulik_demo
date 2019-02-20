<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaskCategory;
use Validator;
use Former;
class TaskCategoriesController extends Controller
{
    //List all task categories
    public function index()
    {
        $task_categories=TaskCategory::all();
        return view('admin.task_categories.index',compact('task_categories'));
    }
    //Create the new task categories
    public function create()
    {
        return view('admin.task_categories.create');
    }
    //Store the details of task categories
    public function store(Request $request)
    {
        //Rules for validation
        $rules=['name' => 'required',];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.'];
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
            $taskCategory = New TaskCategory;
            $taskCategory->name = $request->get('name');
            $taskCategory->save();
            return redirect()->route('taskcategories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('taskcategories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        //
    }
    //Edit the task categories  
    public function edit($id)
    {
        $task_categories=TaskCategory::find($id);
        Former::populate($task_categories);
        return view('admin.task_categories.edit',compact('task_categories'));   
    }
    //Update the task  categories
    public function update(Request $request, $id)
    {
        //Rules for validation
        $rules=['name' => 'required',];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.'];
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
            $task_categories = TaskCategory::find($id);
            $task_categories->name = $request->get('name');
            $task_categories->slug="";
            $task_categories->save();
            return redirect()->route('taskcategories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('taskcategories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Delete the task categories
    public function destroy($id)
    {
        $task_categories = TaskCategory::find($id);
        $task_categories->delete();
        return redirect()->route('taskcategories.index');

    }
}
