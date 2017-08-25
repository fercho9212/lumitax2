<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
           'email'            => 'required|max:30|unique:users,email,'.$this->id,
           'name'             => 'required|max:30',
           'password'         =>  'required',
           'typesrole_id'     =>  'required',
        ];
    }
}
