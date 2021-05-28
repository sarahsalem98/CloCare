<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class PatientsUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'national_id' => [new RequiredIf ($this->national_id),'min:14','unique:patients'],
            'name' => [new RequiredIf ($this->name),'string'],
            'password'=>[new RequiredIf ($this->password)],
            'arriving_date'=>[new RequiredIf ($this->arriving_date),'date'],
            'phone_number'=>[new RequiredIf ($this->phone_number),'integer','min:11'],
            'age'=>[new RequiredIf ($this->age),'integer','min:0','max:110'],
            'bloodType'=>new RequiredIf ($this->phone_number),
            'height'=>[new RequiredIf ($this->height),'integer','min:0','max:200'],
            'weight'=>[new RequiredIf ($this->weight),'integer','min:0','max:200'],
            'gender'=>[new RequiredIf ($this->gender),'in:female,male'],
            'drinks_day'=>[new RequiredIf ($this->drinks_day),'integer'],
            'birth_date'=>[new RequiredIf ($this->birth_date),'date'],
            'address'=> new RequiredIf ($this->address),
             'medicines'=>new RequiredIf ($this->address),
             'hospital_name'=>new RequiredIf ($this->hospital_name),
             'profile_photo_path'=>new RequiredIf ($this->profile_photo_path),
             'education'=>new RequiredIf ($this->education),
             'marital'=>new RequiredIf ($this->marital),
             'insurance'=>[new RequiredIf ($this->insurance),'in:yes,no'],
             'gen_health'=>new RequiredIf ($this->gen_health),
             'smoker'=>[new RequiredIf ($this->smoker),'in:yes,no'],
             'days_active'=>[new RequiredIf ($this->days_active),'intger'],
             'bmi'=>new RequiredIf ($this->bmi),
             'waist'=>[new RequiredIf ($this->waist),'integer'],
             'drinks_day'=>[new RequiredIf ($this->drinks_day),'integer'],
             'income'=>[new RequiredIf ($this->income),'integer'],
             'statues'=>[new RequiredIf ($this->statues),'boolean'],
         
        ];
    }
}
