<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Industrys;
use Validator;
use Former;
class IndustrysController extends Controller
{
   //List all industrys
    public function index()
    {
        $industrys = Industrys::all();
        return view('admin.industrys.index',compact('industrys'));
    }
    //Create the new industry
    public function create()
    {
        return view('admin.industrys.create');
    }
    //Store the industry details
    public function store(Request $request)
    {
        //Rules for validation
        $rules=['name' => 'required',];
        //message for validation
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
            $industrys = New Industrys;
            $industrys->name = $request->get('name');
           
            $industrys->save();
            return redirect()->route('industrys.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('industrys.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        //
    }
    //Edit the industrys
    public function edit($id)
    {
        $industrys=Industrys::find($id);
        Former::populate($industrys);
        return view('admin.industrys.edit',compact('industrys'));
    }
    //Update industrys details
    public function update(Request $request, $id)
    {
        //Rules for validation
        $rules=['name' => 'required',];
        //message for validation
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
            $industrys = Industrys::find($id);
            $industrys->name = $request->get('name');
            $industrys->slug="";
            $industrys->save();
            return redirect()->route('industrys.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('industrys.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Delete the industry
    public function destroy($id)
    {
        $industrys=Industrys::find($id);
        $industrys->delete();
        return redirect()->route('industrys.index');
    }
}
