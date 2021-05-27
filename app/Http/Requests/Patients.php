<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Patients extends FormRequest
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
            'national_id' => 'required|integer|unique:patients|min:14',
            'name' => 'required|string|max:255',
            'arriving_date'=>'required||date',
            'phone_number'=>'required|integer|min:11',
            'age'=>'integer|min:0|max:110',
            'blood_type'=>'required',
            'height'=>'required|integer|min:0|max:200',
            'weight'=>'required|integer|min:0|max:250',
            'gender'=>'string|in:male,female',
            'drinks_day'=>'integer'
            // 'phone_number'=>'required',
            // 'age'=>'required',
            // 'medicines'=>'required',
           
            // 'address'=>'required',
            // 'bloodType'=>'required',
            // 'hospital_name'=>'required',
            // 'statues'=>'requi',
            // 'gender'=>'required',
           

        ];
    }
}
