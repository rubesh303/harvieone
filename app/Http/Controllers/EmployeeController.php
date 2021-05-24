<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees']=Employee::leftJoin('users','users.id','=','employees.user_id')
                            ->leftJoin('designations','designations.id','=','employees.designation')
                            ->select('users.name','users.id','employees.o_email','employees.p_email','employees.id as emp_id','employees.phone','designations.designation_name')
                            ->get();
        return view('employee/view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::pluck('name','name')->all();
        $data['designtions']=Designation::get();
        return view('employee.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'p_email' => 'required|email',
          'o_email' => 'required|email',
          'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
          'dob'=>'required',
          'doj' => 'required',
          'experiance' => 'required',
          'address' => 'required',
          'designation' => 'required',
          'password'=>'required'
       ]);
        $user= User::create([
            'name' => $request->name,
            'email' => $request->o_email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->input('roles'));
        Employee::create([
            'user_id'=>$user->id,
            'emp_name'=>$request->name,
            'p_email'=>$request->p_email,
            'o_email'=>$request->o_email,
            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'doj'=>$request->doj,
            'experiance'=>$request->experiance,
            'address'=>$request->address,
            'designation'=>$request->designation,
        ]);

        return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['designtions']=Designation::get();
       $data['employees']=Employee::where('id','=',$id)->get()->first();
        return view('employee.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
             $user = User::findorfail($request->id);
            $user->name = $request->name;
            $user->save();
            $userdetails= Employee::where("user_id",$user->id)->get()->first();
            $employee = Employee::findorfail($userdetails->id);
            $employee->emp_name = $request->name;
            $employee->p_email = $request->p_email;
            $employee->o_email = $request->o_email;
            $employee->phone = $request->phone;
            $employee->dob = $request->dob;
            $employee->doj = $request->doj;
            $employee->experiance = $request->experiance;
            $employee->address = $request->address;
            $employee->designation = $request->designation;
            $employee->save();
             return redirect()
    ->back()
    ->withInput()
    ->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
         $Employee = Employee::findorfail($request->id)->delete();
    }
}
