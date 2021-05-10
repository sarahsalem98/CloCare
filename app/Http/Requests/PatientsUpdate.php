<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'national_id' => 'required|integer|min:14',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'height'=>'min:0|max:200',
            'weight'=>'min:0|max:200',
            'birth_date'=>'date',
            'phoneNumber'=>'required',
            'age'=>'required',
            'diseases'=>'required',
            'medicines'=>'required',
            'address'=>'required',
            'bloodType'=>'required',
            'statues'=>'required',
            'hospital_name'=>'required',
            'allergies'=>'required',
            'disabilities'=>'required',
        ];
    }
}
