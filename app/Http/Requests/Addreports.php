<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Addreports extends FormRequest
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
            'diagnose'=>'required',
            'medicine'=>'required',
            'traits'=>'required',
            'department'=>'required',
            // 'comments'=>'required',
            'arriving_date'=>'required ||date',
            'discharge_date'=>'required ||date',
            // 'reports_photo_path'=>'required'
        ];
    }
}
