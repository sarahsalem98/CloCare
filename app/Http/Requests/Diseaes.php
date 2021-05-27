<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
           'asthma'=>'boolean'
           ,'chf'=>'boolean'
           ,'cad'=>'boolean'
           ,'mi'=>'boolean'
           ,'cva'=>'boolean'
           ,'copd'=>'boolean'
           ,'cancer'=>'boolean'
           ,'hypertension'=>'boolean'
           ,'diabetes'=>'in:yes,no,borderline'
           ,'pulse'=>'integer'
           ,'sys_bp'=>'integer'
           ,'dia_bp'=>'integer'
        ];
    }
}
