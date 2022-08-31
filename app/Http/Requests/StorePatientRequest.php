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
            'name'       => 'required',
            'age'        => 'required',
            'address'    => 'required',
            'mobile'     => 'required',
            'gendor'     => 'required|in:male,famle',
            'domination' => 'required|in:left_handed,right_handed',
        ];
    }
}
