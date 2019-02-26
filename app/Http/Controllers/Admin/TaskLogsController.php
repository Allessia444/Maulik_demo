<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaskLog;
use Illuminate\Support\Facades\Input;
use Validator;
use Former;
use Auth;
class TaskLogsController extends Controller
{
  
    //List the task logs
    public function index($id)
    {
        $id=$id;
        $task_logs=TaskLog::where('task_id','=',$id)->get();
        return view('admin.task_logs.index',compact('task_logs','id'));
    }
    //Create the new task log
    public function create($id)
    {
        $id=$id;
        return view('admin.task_logs.create',compact('id'));
    }
    //Store the new task log details
    public function store(Request $request,$id)
    {
            $start=strtotime($request->get('start_time'));
            $end=strtotime($request->get('end_time'));
            $diff=$end-$start;
            $spent_time=date('H:i',$diff);
        
         //Rules for validation
         $rules=['start_time' => 'required',
                 'end_time'=>'required ',
                 'date'=>'required',
                 
                ];
        //Message for validation
        $messages=['start_time.required' => 'Please select the start time.',
                    'end_time.required' => 'Please select the end time.',
                    'date.required' => 'Please select the date .',
                   
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
            $date=date('Y-m-d',strtotime($request->get('date')));
            $task_log = New TaskLog;
            $task_log->task_id = $id;
            $task_log->user =Auth::user()->id;
            $task_log->date = $date;
            $task_log->start_time=$request->get('start_time');
            $task_log->end_time=$request->get('end_time');
            $task_log->spent_time=$spent_time;
            $task_log->description=$request->get('description');
            $task_log->billable=$request->get('billable');
            $task_log->save();
            return redirect()->route('tasks.task_logs.index',["id"=>$id])->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('tasks.task_logs.index',["id"=>$id])->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Show the task blog
    public function show($log_id,$id)
    {
        $task_log=TaskLog::find($log_id);
        return view('admin.task_logs.show',compact('task_log','id'));
    }

    public function edit($log_id,$task_id)
    {
        $id=$task_id;
        $log_id=$log_id;
        $task_log=TaskLog::find($log_id);
        Former::populate($task_log);
        return view('admin.task_logs.edit',compact('task_log','id'));
    }

    public function update(Request $request,$log_id,$id)
    {

               $start=strtotime($request->get('start_time'));
               $end=strtotime($request->get('end_time'));
               $diff=$end-$start;
               $spent_time=date('H:i',$diff);
           
            //Rules for validation
            $rules=['start_time' => 'required',
                    'end_time'=>'required ',
                    'date'=>'required',
                    
                   ];
           //Message for validation
           $messages=['start_time.required' => 'Please select the start time.',
                       'end_time.required' => 'Please select the end time.',
                       'date.required' => 'Please select the date .',
                      
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
               $task_log = TaskLog::find($log_id);
               $task_log->task_id = $id;
               $task_log->user =Auth::user()->id;
               $task_log->date = $request->get('date');
               $task_log->start_time=$request->get('start_time');
               $task_log->end_time=$request->get('end_time');
               $task_log->spent_time=$spent_time;
               $task_log->description=$request->get('description');
               $task_log->billable=$request->get('billable');
               $task_log->save();
               return redirect()->route('tasks.task_logs.index',['id'=>$id])->withSuccess("Insert record successfully.");
           }
           catch(\Exception $e)
           {
               return redirect()->route('tasks.task_logs.index',['id'=>$id])->withError('Something went wrong, Please try after sometime.');
           }
    }

    public function destroy($log_id,$id)
    {
        $task_log=TaskLog::find($log_id);
        $task_log->delete();
        return redirect()->route('tasks.task_logs.index',['id'=>$id]);
    }
}
