<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDriverRequest extends FormRequest
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
          'dri_cc' => 'required',
          'dri_name' => 'required',
          'dri_last' => 'required',  
          'dri_address' => 'required',
          'dri_movil' => 'required',
          'dri_phone' => 'required',
          'state_id' => 'required',
          'email' => 'required|email',
          'password' => 'required',
          'lic_no'=>'required',
          'category_id'=>'required',
          'type_id'=>'required',
        ];
    }
}
