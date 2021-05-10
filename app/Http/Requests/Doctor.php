<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|string|max:255',
            'email'=>'required|unique:doctors',
            'national_id' => 'required|integer|unique:doctors',
            'password' => 'required|string|min:5',
            'specialization' => 'required|string|max:255',
            'work_at' => 'required|string|max:255',
        ];
    }
}
