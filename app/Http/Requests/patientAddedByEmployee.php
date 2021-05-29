<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

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
            'national_id' => 'integer|unique:patients|min:14',
            'name' => 'string|max:255',
            'arriving_date'=>'date',
            'phone_number'=>'integer|min:11',
            'age'=>'integer',
            'blood_type'=>new RequiredIf ($this->blood_type),
            'height'=>'integer|min:0|max:200',
            'weight'=>'integer|min:0|max:200'
            

        ];
    }
}
