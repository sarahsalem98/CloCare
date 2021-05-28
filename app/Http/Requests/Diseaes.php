<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class Diseaes extends FormRequest
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
           'asthma'=> [new RequiredIf ($this->asthma),'in:yes,no']
           ,'chf'=>[new RequiredIf ($this->chf),'in:yes,no']
           ,'cad'=>[new RequiredIf ($this->cad),'in:yes,no']
           ,'mi'=>[new RequiredIf ($this->mi),'in:yes,no']
           ,'cva'=>[new RequiredIf ($this->cva),'in:yes,no']
           ,'copd'=>[new RequiredIf ($this->copd),'in:yes,no']
           ,'cancer'=>[new RequiredIf ($this->cancer),'in:yes,no']
           ,'hypertension'=>[new RequiredIf ($this->hypertension),'in:yes,no']
           ,'diabetes'=>[new RequiredIf ($this->diabetes),'in:yes,no,borderline']

           ,'pulse'=>[new RequiredIf ($this->pulse),'integer']
           ,'sys_bp'=>[new RequiredIf ($this->sys_bp),'integer']
           ,'dia_bp'=>[new RequiredIf ($this->dia_bp),'integer']
        ];
    }
}
