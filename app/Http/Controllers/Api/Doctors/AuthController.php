<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'national_id' => 'required|integer|unique:doctors',
            'password' => 'required|string|min:5',
            'specialization' => 'required|string|max:255',
            'work_at' => 'required|string|max:255',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
       if($request->hasFile('profile_photo_path')){
           $path=$request->file('profile_photo_path')->store('Doctors');
       }
        $password=Hash::make($request['password']);
        $doctor=new  Doctors;
        $doctor->name=$request['name'];
        $doctor->national_id=$request['national_id'];
        $doctor->specialization=$request['specialization'];
        $doctor->work_at=$request['work_at'];
        $doctor->password=$password;
        $doctor->api_token= Str::random(100);
        $doctor->profile_photo_path=$path;
        $doctor->save();
        // $user = Doctors::create($request->toArray());
        // $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        // $response = ['token' => $token];
          return response($doctor, 200);
    }

    public function login (Request $request) {
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
            if (Hash::check($request->password, $user->password)) {
                $token = $user->api_token;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
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
