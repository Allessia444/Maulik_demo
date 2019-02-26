<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use Validator;
use Former;
use App\User;
use App\TeamLead;
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

    //Show perticular department detail
    public function show($id)
    {
        $departments=Department::find($id);
        return view('admin.departments.show',compact('departments'));
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

    //Teamlead data show
    public function teamlead($id){
        $department=Department::find($id);
        $teamleads=User::where([['department_id','=',$id],['team_lead','=',1]])->get()->pluck('first_name','id');
        $members=User::where([['department_id','=',$id],['team_lead','=',0]])->get()->pluck('first_name','id');
        $select_members=TeamLead::where('department_id','=',$id)->select('member_id')->get()->pluck('member_id');
        $select_teamleads=TeamLead::where('department_id','=',$id)->select('teamlead_id')->get()->pluck('teamlead_id');
        // dd($select_members);
        Former::populate($teamleads);
        Former::populate($members);
        Former::populate($select_members);
        return view('admin.departments.teamleads',compact('department','teamleads','members','select_members','select_teamleads'));
    }

    public function teamlead_store(Request $request){
            $members=$request->get('members');
            $teamlead=TeamLead::where('department_id','=',$request->get('department_id'))->delete();
        foreach ($members as $key => $value) {
            $teamlead=new TeamLead;  
            $teamlead->member_id=$value;
            $teamlead->teamlead_id=$request->get('teamleads');
            $teamlead->department_id=$request->get('department_id') ;
            $teamlead->save();
        }
        return redirect()->route('departments.index');
    }

    // public function teamlead_update(Request $request){
    //         $members=$request->get('members');

    //         // $teamlead->delete();
    //     foreach ($members as $key => $value) {
    //         $teamlead=new TeamLead;  
    //         $teamlead->member_id=$value;
    //         $teamlead->teamlead_id=$request->get('teamleads');
    //         $teamlead->department_id=$request->get('department_id') ;
    //         $teamlead->save();
    //     }
    //     return redirect()->route('departments.index');
    // }
}
