<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Former;
use Validator;
use App\TaskCategory;
use App\User;
use Auth;
class TasksController extends Controller
{
 
    //List all tasks
    public function index()
    {
        $tasks=Task::where('completed','=',0)->get();
        return view('admin.tasks.index',compact('tasks'));
    }

    //Create new task
    public function create()
    {
        $task_categories=TaskCategory::all()->pluck('name','id');
        $users=User::where('role','=','user')->get()->pluck('first_name','id');
        Former::populate($task_categories);
        return view('admin.tasks.create',compact('task_categories'));
    }

    //Store the new task details
    public function store(Request $request)
    {
         //Rules for validation
         $rules=['name' => 'required',
                 'task_category_id'=>'required',
                 
                ];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    'task_category_id.required' => 'Please select task category.',
                   
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
            $tasks = New Task;
            $tasks->task_category_id = $request->get('task_category_id');
            $tasks->user_id =Auth::user()->id;
            $tasks->name = $request->get('name');
            $tasks->notes=$request->get('notes');
            $tasks->start_date=$request->get('start_date');
            $tasks->end_date=$request->get('end_date');
            $tasks->priority=$request->get('priority');
            $tasks->save();
            return redirect()->route('tasks.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Show the task details
    public function show($id)
    {
        $task=Task::find($id);
        return view('admin.tasks.show',compact('task'));
    }

    //Edit the task detail
    public function edit($id)
    {
        $tasks=Task::find($id);
        $task_categories=TaskCategory::all()->pluck('name','id');
        $users=User::where('role','=','user')->get()->pluck('first_name','id');
        Former::populate($users);
        Former::populate($task_categories);
        Former::populate($tasks);
        return view('admin.tasks.edit',compact('task_categories','users','tasks'));
    }
    //Update task details
    public function update(Request $request, $id)
    {
        
         //Rules for validation
         $rules=['name' => 'required',
                 'task_category_id'=>'required',
                 
                ];
        //Message for validation
        $messages=['name.required' => 'Please enter  name.',
                    'task_category_id.required' => 'Please select task category.',
                   
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
            $tasks = Task::find($id);
            $tasks->task_category_id = $request->get('task_category_id');
            $tasks->user_id = Auth::user()->id;
            $tasks->name = $request->get('name');
            $tasks->notes=$request->get('notes');
            $tasks->start_date=$request->get('start_date');
            $tasks->end_date=$request->get('end_date');
            $tasks->priority=$request->get('priority');
            $tasks->save();
            return redirect()->route('tasks.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //Delete the task
    public function destroy($id)
    {
        $tasks=Task::find($id);
        $tasks->delete();
        return redirect()->route('tasks.index');
    }
    //Task completed
    public function completed(Request $request){
        $task_id=$request->get('task_id');
        try{
            $completed=Task::find($task_id);
            $completed->completed=1;
            $completed->save();
            return response()->json([
                    'status' => 200
                ]);
        }
        catch(\Exception $e){
            return response()->json(['status'=>422]);
        }      
    }
    //Dropdown show task
    public function dropdown(){
        $tasks=TaskCategory::all();
        Former::populate($tasks);
        return view('admin.colors.dropdown_task',compact('tasks'));
    }
    //Task details
    public function details($id){
        $task=Task::where('task_category_id','=',$id)->get();
        // return response()->json(['name'=>$task->name,'id'=>$task->id],200);
        return view('admin.colors.task',compact('task'));
    }

    public function taskdetails($id){
        
        $task=Task::find($id);
        return response()->json(['name'=>$task->name,'id'=>$task->id],200);
        // return view('admin.colors.task',compact('task'));
    }
}
