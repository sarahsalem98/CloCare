<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\RequiredIf;

class DoctorsUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>[new RequiredIf ($this->name),'string'],
            'email'=> [new RequiredIf ($this->email),'unique:doctors'],
            'national_id' => [new RequiredIf ($this->national_id),'integer','min:14','unique:doctors'],
            'specialization' =>  [new RequiredIf ($this->specialization),'string'],
            'work_at' =>  [new RequiredIf ($this->work_at),'string'],
            'profile_photo_path'=> new RequiredIf ($this->profile_photo_path),
            'phone_number'=> [new RequiredIf ($this->phone_number),'integer','min:11']
        ];
    }
}
