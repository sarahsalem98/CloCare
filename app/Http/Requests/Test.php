<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Test extends FormRequest
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
                  
                    'wbc'=>'integer'
                    ,'hgb'=>'integer'
                    ,'hct'=>'integer'
                    ,'platelets'=>'integer'
                    ,'alt'=>'integer'
                    ,'ast'=>'integer'
                    ,'alk_phos'=>'integer'
                    ,'bun'=>'integer'
                    ,'cr'=>'integer'
                    ,'sodium'=>'integer'
                    ,'potassium'=>'integer'
                    ,'chloride'=>'integer' ,'bicrab'=>'integer'
                    ,'a1c'=>'integer','insulin'=>'integer'
                    ,'iron'=>'integer','u_acid'=>'integer',
                    's_cotinine'=>'integer','s_cotinine'=>'integer',
                    'cpk'=>'integer','ldh'=>'integer'
                    ,'asthma'=>'integer','fvc'=>'integer'
                    ,'fev1'=>'integer','fev1_fvc_ratio'=>'integer',
                    'memory'=>'integer'
                    ,'ca'=>'integer','phos'=>'integer'
                    ,'t_bilirubin'=>'integer','alb'=>'integer'
                    ,'t_protein'=>'integer','glob'=>'integer'
                    ,'glucose'=>'integer','glucose1'=>'integer'
                    ,'alb_cr_ratio'=>'integer','trigs'=>'integer'
                    ,'t_chol'=>'integer','hdl'=>'integer','ldl_chol'=>'integer'
        ];
    }
}
