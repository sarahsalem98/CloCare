<?php

namespace App\Http\Controllers;

use App\Http\Requests\patientAddedByEmployee;
use App\Http\Resources\Patient;
use App\Models\Patients;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class employee extends Controller
{
    public function login( Request $request){
        try{
            $validator = validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails())
            {
                return response([
                    "message"=>'The given data was invalid.',
                    "errors"=>$validator->errors()
                ], 422);
            }
             $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check( $request->password,$user->password )) {
                    $token = $user->api_token;
                    return response()->json([ 'message'=>'suceess','token'=>$token],200); 
                } else {
                
                    return response()->json( ["message" => "Password mismatch"],422);
    
                }
            } else {
            
                return response()->json(["message" =>'User does not exist'],422);
            }
        }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }
       
    }


    public function addPatient(patientAddedByEmployee $request ){
        try{
       
            $validatedData=$request->validated();
            $patient= new Patients();
            $patient->fill($validatedData);
            $patient->password=bcrypt($request['national_id']);
            $patient->api_token=Str::random(100);
            // if($request->hasFile('profile_photo_path')){
            //     $path=$request->file('profile_photo_path')->store('patients');
            //     $patient->profile_photo_path=$path;
            // }
           
            $patient->save();
             return response()->json(["Created Patient"=>$patient],200);

        }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }
     
    }


    public function CheckPatient($id){
        try{
            $patient= Patients::where('national_id',$id)->get();
        if($patient){
            return response()->json($patient[0]);
        }else{
            return response()->json(['message'=>'the patient you want  can noy be found please make sue=rw you add him/her']);
        }

         }catch(Exception $e){
            return response()->json(['errors' => $e->getMessage()], 500);
        }

    }
}
