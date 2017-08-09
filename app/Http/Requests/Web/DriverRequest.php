<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
      if ($this->method()=='PUT') {
        return [
          'dri_cc' => 'required',
          'dri_name' => 'required',
          'dri_last' => 'required',
          'dri_address' => 'required',
          'dri_movil' => 'required',
          'dri_phone' => 'required',
          'state_id' => 'required',
          'email' => 'required|email|unique:drivers,email,'.$this->id,
          'lic_no'=>'required',
          'category_id'=>'required',
          'type_id'=>'required',
        ];
      }else {
        return [
          'dri_cc' => 'required',
          'dri_name' => 'required',
          'dri_last' => 'required',
          'dri_address' => 'required',
          'dri_movil' => 'required',
          'dri_phone' => 'required',
          'state_id' => 'required',
          'email' => 'required|email|unique:drivers,email,'.$this->id,
          'password' => 'required|same:password',
          'lic_no'=>'required',
          'category_id'=>'required',
          'type_id'=>'required',
        ];
      }

    }
}
