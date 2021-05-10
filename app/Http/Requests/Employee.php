<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Employee extends FormRequest
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
            'name' => 'required|string|max:255',
            'email'=>'required|unique:employees',
            'national_id' => 'required|integer|unique:employees',
            'password' => 'required|string|min:8',
            'specialization' => 'required|string|max:255',
            'work_at' => 'required|string|max:255',
            'phone_number'=>'required|integer',
            'address'=>'required|string',
            'is_admin'=>'required|boolean'
        ];
    }
}
