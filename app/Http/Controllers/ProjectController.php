<?php

namespace App\Http\Controllers;

use App\Project;
use App\Employee;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects']=Project::leftJoin('users','users.id','=','projects.project_owner')->select('projects.project_name','projects.project_desc','projects.id as pro_id','users.name','users.id')->get();
        return view('project.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['employees']=Employee::leftJoin('users','users.id','=','employees.user_id')->select('users.name','users.id')->get();
        return view('project.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project= new Project;
        $project->project_name=$request->project_name;
        $project->project_desc=$request->project_desc;
        $project->project_owner=$request->project_owner;
        $project->save();
        return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Project Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['project']=Project::where('id','=',$id)->get()->first();
        $data['employees']=Employee::leftJoin('users','users.id','=','employees.user_id')->select('users.name','users.id')->get();
        return view('project.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
            $project = Project::findorfail($request->id);
            $project->project_name = $request->project_name;
            $project->project_desc = $request->project_desc;
            $project->project_owner = $request->project_owner;
            $project->save();
            return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = Project::findorfail($id)->delete();
        return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Project Deleted Successfully');
    }
}
