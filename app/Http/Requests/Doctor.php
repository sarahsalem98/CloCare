<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\RequiredIf;

class Doctor extends FormRequest
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
            'name' =>  'required|string',
            'email'=> [new RequiredIf ($this->email),'unique:doctors'],
            'national_id' => 'required| unique:doctors|integer|min:14',
            'specialization' =>  [new RequiredIf ($this->specialization),'string'],
            'work_at' =>  [new RequiredIf ($this->work_at),'string'],
            'profile_photo_path'=> new RequiredIf ($this->profile_photo_path),
            'phone_number'=> [new RequiredIf ($this->phone_number),'integer','min:11']
        ];
    }
}
