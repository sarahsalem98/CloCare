<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee as RequestsEmployee;
use App\Http\Requests\EmployeeUpdate;
use App\Models\Employee as ModelsEmployee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Employee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Employee.AllEmployee', ['employees' => User::get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.CreateEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsEmployee $request)
    {
        $validatedData = $request->validated();
        $employee = new User();
        $employee->fill($validatedData);
        $employee->password = bcrypt($request['password']);
        $employee->api_token = Str::random(100);
        if ($request->hasFile('profile_photo_path')) {
            $path = $request->file('profile_photo_path')->store('Employee');
            $employee->profile_photo_path = $path;
        }
        $employee->save();

        return redirect('/Employee');  
       // echo 'lkjdf';
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::findOrFail($id);
        return view('Employee.Details', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);

        return view('Employee.EditEmployee', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdate $request, $id)
    {
        $employee = User::findOrFail($id);
        $validatedData = $request->validated();
        $employee->fill($validatedData);
        if ($request->hasFile('profile_photo_path')) {
            $path = $request->file('profile_photo_path')->store('Employee');
            if ($employee->profile_photo_path) {
                Storage::delete($employee->profile_photo_path);
            }
            $employee->profile_photo_path = $path;
        }
        $employee->save();
        return redirect('/Employee');  
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::find($id);
        $employee->delete();
        return redirect('/Employee');
    }


    public function search(Request $request)
    {
        $word = $request->get('search');
        $employees = User::where('national_id', 'LIKE', '%' . $word . '%')->get();

        return view('Employee.SearchEmployee', ['employees' => $employees]);
    }
}
