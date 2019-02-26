<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Designation;
use Validator;
use Former;
class DesignationsController extends Controller
{
    //List all designations 
    public function index()
    {
         $designations = Designation::all();
        return view('admin.designations.index',compact('designations'));
    }
    //Create the designation
    public function create()
    {
        return view('admin.designations.create');
    }
    //Store the details of designation
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
            $designations = New Designation;
            $designations->name = $request->get('name');
            $designations->save();
            
            return redirect()->route('designations.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('designations.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //Show perticular designation details
    public function show($id)
    {
        $designations=Designation::find($id);
        return view('admin.designations.show',compact('designations'));
    }
    //Edit the designation
    public function edit($id)
    {
        $designations=Designation::find($id);
        Former::populate($designations);
        return view('admin.designations.edit',compact('designations'));
    }
    //Update the designations details
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
            $designations = Designation::find($id);
            $designations->name = $request->get('name');
            $designations->save();
            
            return redirect()->route('designations.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('designations.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Delete the designation
    public function destroy($id)
    {
        $designation=Designation::find($id);
        $designation->delete();
        return redirect()->route('designations.index');
    }
}
