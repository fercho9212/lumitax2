<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
           'placa'           => 'required|max:6|unique:vehicles',
           'veh_model'       => 'required|max:4',
           'veh_motor'       => 'required|max:15',
          //$vehicle->serie     =$request->veh_serie;
           'veh_serie'      => 'required|max:15',
           'veh_vin'         => 'required|max:15',
           'veh_color'       => 'required|max:15',
           'brand_id'        => 'required|max:15',
           'class_id'        => 'required|max:15',
           'typevehicle_id'  => 'required|max:15',
           'leveles_id'      => 'required|max:1',
        ];
    }
}
