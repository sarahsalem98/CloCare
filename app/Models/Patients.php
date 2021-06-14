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
    'birth_date',
    'age',
    'height',
    'weight',
    'bloodType',
    'profile_photo_path',
    'hospital_name',
    'gender',
    'phone_number',
    'medicines',
    'address',
    'drinks_day',
    'waist',
    'bmi',
    'days_active',
    'smoker',
    'gen_health',
    'insurance',
    'marital',
    'education',
    'status',
    'arriving_date',
     'income'
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

// public function makeReports(){
// return $this->belongsToMany('App\Models\Doctors','reports','patient_id','doctor_id')
// ->withPivot('patient_id','doctor_id','diagnose','reports_photo_path','medicine','traits','department','comments','arriving_date','discharge_date')->withTimestamps();
// }

public function sensors(){
    return $this->hasMany(Sensors::class,'patient_id','id');
}

// public function test(){
//     return $this->belongsToMany('App\Models\Patients','test_values','patient_id','doctor_id')
//     ->withPivot(
//         'patient_id'
//         ,'test_id'
//         ,'doctor_id'
//         ,'wbc'
//         ,'hgb'
//         ,'hct'
//         ,'platelets'
//         ,'alt'
//         ,'ast'
//         ,'alk_phos'
//         ,'bun'
//         ,'cr'
//         ,'sodium'
//         ,'potassium'
//         ,'chloride' ,'bicrab','a1c','insulin','iron','u_acid','s_cotinine','s_cotinine','cpk','ldh','asthma','fvc','fev1','fev1_fvc_ratio','memory'
//         ,'ca','phos','t_bilirubin','alb','t_protein','glob','glucose','glucose1','alb_cr_ratio','trigs','t_chol','hdl','ldl_chol'
//         )->withTimestamps();
// }
public function test(){
    return $this->hasMany(TestValue::class,'patient_id','id');
}
public function report(){
    return $this->hasMany(Reports::class,'patient_id','id');
}

public function disease(){
    return $this->hasMany(Diseaes::class,'patient_id','id');
}
public function reportDoctor(){
    return $this->hasMany(Reports::class,'doctor_id','id');
}
// public function doctor(){
//     return $this->belongsToMany(Doctors::class);
// }

}
        