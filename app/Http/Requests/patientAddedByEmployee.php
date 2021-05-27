<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class patientAddedByEmployee extends FormRequest
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
            'age'=>'required|integer',
            'blood_type'=>'requird',
            'height'=>'required|integer|min:0|max:200',
            'weight'=>'requird|integer|min:0|max:200'
            

        ];
    }
}
