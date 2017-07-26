<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
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
        'description'     => 'max:50',
        'doc_datei'       => 'required',
        'doc_datef'       => 'required',
        'doc_company'     => 'max:25',
        'doc_policy'      => 'max:15',
      ];
  }
}
