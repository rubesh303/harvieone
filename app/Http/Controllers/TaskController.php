<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\Employee;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tasks']=Task::leftJoin('users','users.id','=','tasks.followed_emp')
        ->leftJoin('projects','projects.id','=','tasks.project_id')
        ->select('tasks.task_name','tasks.id','tasks.task_desc','tasks.due_date','tasks.completed_date','tasks.followed_emp','users.name','projects.project_name')->get();
        return view('task.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['projects'] = Project::get();
        $data['employees']=Employee::leftJoin('users','users.id','=','employees.user_id')->select('users.name','users.id')->get();
        return view('task.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $task= new Task;
        $task->project_id=$request->project_id;
        $task->task_name=$request->task_name;
        $task->task_desc=$request->task_desc;
        $task->task_owner=$request->task_owner;
        $task->due_date=$request->due_date;
        $task->completed_date=$request->completed_date;
        $task->comments=$request->comments;
        $task->followed_emp=$request->followed_emp;
        $task->color=$request->task_color;
        $task->save();
        return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Task Added Successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['projects'] = Project::get();
        $data['task']=Task::where('id','=',$id)->get()->first();
        $data['employees']=Employee::leftJoin('users','users.id','=','employees.user_id')->select('users.name','users.id')->get();
        return view('task.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task= Task::findorfail($request->id);
        $task->project_id=$request->project_id;
        $task->task_name=$request->task_name;
        $task->task_desc=$request->task_desc;
        $task->task_owner=$request->task_owner;
        $task->due_date=$request->due_date;
        $task->completed_date=$request->completed_date;
        $task->comments=$request->comments;
        $task->followed_emp=$request->followed_emp;
        $task->color=$request->task_color;
        $task->save();
        return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Task = Task::findorfail($id)->delete();
         return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Task Deleted Successfully');
    }
}
