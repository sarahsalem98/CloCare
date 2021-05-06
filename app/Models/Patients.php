<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Patients extends Model
{
    use HasFactory;
    use HasApiTokens;

 protected $fillable=[
    'national_id',
    'name',
    'phoneNumber',
    'birth_date',
    'age',
    'height',
    'weight',
    'bloodType',
    'profile_photo_path',
    'diseases',
    'medicines',
    'address'
];
protected $casts=[
    'diseases'=>'array',
    'medicines'=>'array'
];

protected $hidden = [
 'api_token',
 'password'
];
public function url(){
return Storage::url($this->profile_photo_path);
}

public function makeReports(){
return $this->belongsToMany('App\Models\Doctors','reports','patient_id','doctor_id')
->withPivot('patient_id','doctor_id','diagnose','reports_photo_path','medicine','traits','department','comments','arriving_date','date')->withTimestamps();
}

public function sensors(){
    return $this->hasMany(Sensors::class,'patient_id','id');
}

}
        