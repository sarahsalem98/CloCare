<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class EmployeeUpdate extends FormRequest
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
            'national_id' => [new RequiredIf ($this->national_id),'integer','min:14','unique:users'],
            'name' =>  [new RequiredIf ($this->name),'string'],
            'email'=> [new RequiredIf ($this->email),'string','unique:users'],
            'password' =>  [new RequiredIf ($this->password),'string','min:8'],
            'specialization' =>  [new RequiredIf ($this->specialization),'string'],
            'work_at' =>  [new RequiredIf ($this->work_at),'string'],
            'phone_number'=> [new RequiredIf ($this->phone_number),'integer','min:11'],
            'address'=> [new RequiredIf ($this->address),'string'],
            'is_admin'=> [new RequiredIf ($this->is_admin),'boolean'],
        ];
    }
}
