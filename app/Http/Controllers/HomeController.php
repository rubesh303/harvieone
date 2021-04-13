<?php

namespace App\Http\Controllers;
use App\Employee;
use App\User;
use App\Designation;
use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if($_GET){
           $data['tasks']= Task::where('due_date', 'LIKE', '%'. $_GET['due_date'].'%')->orWhere('task_owner', 'LIKE', '%'. $_GET['employee'].'%')->paginate(10);
        }else{
        $data['tasks']=Task::leftJoin('users','users.id','=','tasks.followed_emp')
        ->leftJoin('projects','projects.id','=','tasks.project_id')
        ->select('tasks.task_name','tasks.id','tasks.task_desc','tasks.due_date','tasks.completed_date','tasks.followed_emp','users.name','projects.project_name')->paginate(10);
    }
    $data['employees']=Employee::leftJoin('users','users.id','=','employees.user_id')->select('users.name','users.id')->get();
        return view('home',$data);
    }
}
