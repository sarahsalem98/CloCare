<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor;
use App\Http\Requests\DoctorsUpdate;
use App\Models\Doctors as ModelsDoctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Doctors extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Doctors.AllDoctors',['doctors'=>ModelsDoctors::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Doctors.CreateDoctors');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Doctor $request)
    {
       $validatedData=$request->validated();
       $doctor=new  ModelsDoctors;
       $doctor->fill($validatedData);
       $doctor->password=Hash::make($request['password']);
       $doctor->api_token= Str::random(100);
       if($request->hasFile('profile_photo_path')){
           $path=$request->file('profile_photo_path')->store('Docrors');    
    }

    $doctor->profile_photo_path=$path;
    $doctor->save();
    

    

  return redirect('/Doctors');





  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor=ModelsDoctors::findOrFail($id);
       return view('Doctors.Details',['doctor'=>$doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor=ModelsDoctors::find($id);

       return view('Doctors.EditDoctors',['doctor'=>$doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorsUpdate $request, $id)
    {
       $doctor=ModelsDoctors::findOrFail($id);
       $validatedData=$request->validated();
       $doctor->fill($validatedData);
       if($request->hasFile('profile_photo_path')){
       $path=$request->file('profile_photo_path')->store('Docrors');
       if($doctor->profile_photo_path){
           Storage::delete($doctor->profile_photo_path);
       }
        $doctor->profile_photo_path=$path;
       }
        $doctor->save();
        return redirect('/Doctors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $doctor=ModelsDoctors::find($id);
        $doctor->delete();
        return redirect('/Doctors');
       
    }

    public function search(Request $request) {
       $word=$request->get('search');
       $doctors=ModelsDoctors::where('national_id','LIKE','%'.$word.'%')->get();

       return view('Doctors.SearchDoctors',['doctors'=>$doctors]);

   }
}
