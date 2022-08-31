<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHealerRequest extends FormRequest
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
            'name'                  => 'required',
            'age'                   => 'required',
            'gendor'                => 'required',
            'academic_achievement'  => 'required',
            'email'                 => 'required|email|max:255|unique:users,email,'.$this->route()->healer->id,
            'mobile'                => 'required|numeric|unique:users,mobile,'.$this->route()->healer->id,
            'password'              => 'nullable|min:8',
            'status'                => 'nullable',
        ];
    }
}
