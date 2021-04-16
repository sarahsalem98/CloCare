<?php

namespace App\Http\Controllers\Api\Patients;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $patient=Patients::find($id);
          
            if($patient){
                if($patient->id===Auth::user()->id){
                    return response()->json(["desirsd patient"=>$patient],200);
                }else{
                    return response()->json(['msg'=>'Unauthorized'],401);
                }
                
            }else{
              return response()->json(["msg"=>"patient is not found"],404);
            }
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showMedicalHistory ($id){
        try{
         
           $patient= Patients::find($id);
        //    $report=Reports::where('patient_id','=',$id)->get();
           if($patient){
               return response()->json([
                   // 'all reports this patient has '=>$report
               $patient->with('makeReports')->get(),
           //    'sdfs'=> $patient->makeReports()->limit(1)->get()
               ]
               ,200);
           }else{
               return response()->json(['msg'=>'patient is not found'],404);
           }
        }catch(Exception $e){
           return response()->json(['error' => $e->getMessage()], 500);
       }

   

     }
}
