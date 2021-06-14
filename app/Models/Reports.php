<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

protected $fillable=[
   'diagnose',
   'reports_photo_path',
   'medicine',
   'traits',
   'department' ,
   'comments',
   'arriving_date',
   'discharge_date',
   
];
public function patient(){
    return $this->belongsTo(Patients::class,'patient_id','id');
}
public function doctorMadeReport()
{
    return $this->belongsTo(Doctors::class,'doctor_id','id');
}

}
