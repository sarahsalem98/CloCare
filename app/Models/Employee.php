<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=[
        'name' ,
        'email',
        'national_id' , 
        'password' ,
        'specialization' , 
        'work_at' ,
        'phone_number',
        'api_token',
        'address'
    ];


  public function url(){
        return Storage::url($this->profile_photo_path);
    }
}
