<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

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
            'email'=>'required|unique:users',
            'national_id' => 'required|integer|unique:users',
            'specialization' => [new RequiredIf ($this->specialization),'string'],
            'work_at' => [new RequiredIf ($this->work_at),'string'],
            'phone_number'=>[new RequiredIf ($this->phone_number),'integer','min:11'],
            'address'=>[new RequiredIf ($this->address),'string'],
            'is_admin'=>[new RequiredIf ($this->income),'boolean']
        ];
    }
}
