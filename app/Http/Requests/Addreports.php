<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

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
            'diagnose'=>new RequiredIf ($this->diagnose),
            'medicine'=>new RequiredIf ($this->medicine),
            'traits'=>new RequiredIf ($this->traits),
            'department'=>new RequiredIf ($this->department),
            'comments'=>new RequiredIf ($this->comments),
            'arriving_date'=>[new RequiredIf ($this->arriving_date),'date'],
            'discharge_date'=>[new RequiredIf ($this->discharge_date),'date'],
             'reports_photo_path'=>new RequiredIf ($this->reports_photo_path),
        ];
    }
}
