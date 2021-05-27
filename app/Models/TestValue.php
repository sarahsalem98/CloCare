<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestValue extends Model
{
    use HasFactory;
    public function patient(){
        return $this->belongsTo(Patients::class,'patient_id','id');
    }

    protected $fillable=[
        'patient_id'
        ,'test_id'
        ,'doctor_id'
        ,'wbc'
        ,'hgb'
        ,'hct'
        ,'platelets'
        ,'alt'
        ,'ast'
        ,'alk_phos'
        ,'bun'
        ,'cr'
        ,'sodium'
        ,'potassium'
        ,'chloride' ,'bicrab','a1c','insulin','iron','u_acid','s_cotinine','s_cotinine','cpk','ldh','asthma','fvc','fev1','fev1_fvc_ratio','memory'
        ,'ca','phos','t_bilirubin','alb','t_protein','glob','glucose','glucose1','alb_cr_ratio','trigs','t_chol','hdl','ldl_chol'
    ];

    public function patientTest(){
        return $this->belongsTo(Patients::class,'patient_id','id');
    }
}
