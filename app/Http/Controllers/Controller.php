<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

public function loginAdmin(Request $request ){
    if(Auth::attempt(
        [
            'email'=>$request['email'],
            'password'=>$request['password'],
            'is_admin'=>1
        ]
    )){
        return redirect('/dashboard');
    }
    else{
        echo"<h2>you are not allowed to get to this page</h2> ";
    }
}
   
}
