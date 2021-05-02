<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Http\Controllers\Controller;
use App\Http\Resources\Doctor;
use App\Models\Doctors;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
   
    public function login (Request $request) {
        try{
            $validator = Validator::make($request->all(), [
                'national_id' => 'required|string',
                'password' => 'required|string|min:5',
            ]);
            if ($validator->fails())
            {
                return response(['errors'=>$validator->errors()->all()], 422);
            }
             $user = Doctors::where('national_id', $request->national_id)->first();
            if ($user) {
                if (Hash::check( $request->password,$user->password )) {
                    $token = $user->api_token;
                    return [ 'doctor'=>new Doctor($user)]; 
                } else {
                
                    return response()->json( ["message" => "Password mismatch"],422);
    
                }
            } else {
            
                return response()->json(["message" =>'User does not exist'],422);
            }
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
       
    }




    public function resetPassword(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'national_id' => 'required|string',
                'password' => 'required|string|min:5|confirmed',
            ]);
            if ($validator->fails())
            {
                return response(["errors"=>$validator->errors()->all()], 422);
            }
                $token = $request->bearerToken();
                $password=$request->password;
                $user = Doctors::where('national_id', $request->national_id)->first();
                if($token==$user->api_token){
                    $user->password =bcrypt($password) ;
                    $user->save();
                    return response()->json(["message" => "Password has been successfully changed"]);
                }else {
                return response()->json(["message" => "Invalid token provided"], 400);
            }

        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
        

      
    }



}

// $table->id();
// $table->integer('national_id')->index();
// $table->string('name');
// $table->string('email')->unique()->nullable();
// $table->string('password');
// $table->text('profile_photo_path')->nullable();
// $table->string('specialization');
// $table->string('work_at');
// $table->string('api_token',100)
// ->unique()
// ->nullable()
// ->default(null);



// dN5NL7PZXFouDbSy7kP66LKj2rzJWlW5oc8optbetJD015Qj3QeWtKzO44848NP5UlzOyU9UrXKXHc8snFgcORNKK5yggkv3hk90