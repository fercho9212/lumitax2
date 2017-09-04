<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ApiVehicleRequest extends FormRequest
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
          'placa'           => 'required|max:6|unique:vehicles,placa',
          'veh_model'       => 'required|max:4',
          'space_id'        => 'required|max:1',
          'baul_id'         => 'required|max:1',
          'veh_serie'      => 'required|max:15',
          'veh_color'       => 'required|max:15',
          'brand_id'        => 'required|max:15',
          'leveles_id'      => 'required|max:1',
        ];
    }
}
