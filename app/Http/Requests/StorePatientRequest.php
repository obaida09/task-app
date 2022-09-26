<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'name'                    => 'required|max:55',
            'age'                     => 'required|numeric|max:255',
            'address'                 => 'required|max:255',
            'mobile'                  => 'required|max:10000000000000|numeric|unique:patients',
            'sex'                     => 'required|in:male,famle',  
            'side_dominance'          => 'nullable|in:left,right',
        ];

    }
}
