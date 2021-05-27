<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test;
use App\Models\Patients;
use App\Models\TestName;
use App\Models\TestValue;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TestController extends Controller
{
   public function testNames(){
       try{
       $testnames=TestName::get(); 
       return response()->json(['test names are'=>$testnames]);

       }catch(Exception $e){
        return response()->json(['errors' => $e->getMessage()], 500);
       }
   }



    public function addtest(Test $request,$test_id,$patient_id){

        try{     
            $patient= Patients::find($patient_id);
            // $validatedData=$request->validated();
            if($patient){
                $validatedData=$request->validated();
                 $test =new TestValue;
                $test->fill($validatedData);
                $test->test_id=$test_id;
                 $test->doctor_id=Auth::user()->id;
                $patient->test()->save($test);
                 
                    return response()->json([
                        'message'=>' test has been added successfuly',
                        'patient ID'=>$patient->id
                    ,   ' tests for tha same patient'=>$patient->where('id',$patient_id)->with('test')->get()
                   //  ,'doctor that make the report '=>$patient->hasReports()->get()
                     ],200);
                    }else{
                        return response()->json(['message'=>'patient is not found so you can not add reports'],404);
                    }
            

           }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
           }


    }











    

}
// 'test_id'=>$test_id,   
// 'wbc'=>$request['wbc'],
// 'hgb'=>$request['hgb'],
//  'hct'=>$request['hct'], 'alt'=>$request['alt'], 'ast'=>$request['ast'], 'alk_phos'=>$request['alk_phos'], 'bun'=>$request['bun'],
//  'cr'=>$request['cr'], 'sodium'=>$request['sodium'], 'potassium'=>$request['potassium'], 'chloride'=>$request['chloride'], 'bicrab'=>$request['bicrab'], 'hct'=>$request['hct'],
//  'ca'=>$request['ca'], 'phos'=>$request['phos'], 't_bilirubin'=>$request['t_bilirubin'], 'alb'=>$request['alb'], 't_protein'=>$request['t_protein'],
//  'glob'=>$request['glob'], 'glucose'=>$request['glucose'], 'glucose1'=>$request['glucose1'], 'alb_cr_ratio'=>$request['alb_cr_ratio'], 'trigs'=>$request['trigs'], 't_chol'=>$request['t_chol'],
//  'hdl'=>$request['hdl'], 'ldl_chol'=>$request['ldl_chol'], 'a1c'=>$request['a1c'], 'insulin'=>$request['insulin'], 'iron'=>$request['iron']
//  , 'u_acid'=>$request['u_acid'], 's_cotinine'=>$request['s_cotinine'], 'cpk'=>$request['cpk'], 'ldh'=>$request['ldh'], 'asthma'=>$request['asthma']
//  , 'fvc'=>$request['fvc'],'fev1'=>$request['fev1'],'fev1_fvc_ratio'=>$request['fev1_fvc_ratio'],'memory'=>$request['memory'],
//  'platelets'=>$request['platelets'],