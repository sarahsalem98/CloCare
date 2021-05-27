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
            'national_id' =>'integer|min:14',
            'name' =>'string|max:255',
            'height'=>'min:0|max:200',
            'weight'=>'min:0|max:250',
            'birth_date'=>'date',
             'arriving_date'=>'date',
             'statues'=>'boolean',
             'smoker'=>'boolean',
             'insurance'=>'boolean',
             'gender'=>'string|in:male,female',
             'age'=>'integer|min:0|max:110'
         
        ];
    }
}
