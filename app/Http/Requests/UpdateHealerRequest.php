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
            // 'name'                  => 'required',
            // 'age'                   => 'required',
            // 'gendor'                => 'required',
            // 'academic_achievement'  => 'required',
            // 'email'                 => 'required|email|max:255|unique:users,email,'.$this->route()->healer->id,
            // 'mobile'                => 'required|numeric|unique:users,mobile,'.$this->route()->healer->id,
            // 'password'              => 'nullable|min:8',
            // 'status'                => 'nullable',
          
            'name'                    => 'required',
            'age'                     => 'required',
            'side_dominance'          => 'required',
            'sex'                     => 'required',
            'email'                   => 'required|email|max:255|unique:users,email,'.$this->route()->healer->id,
            'mobile'                  => 'required|numeric|unique:users',
            'password'                => 'required|min:8',
            'treatments'              => 'required',
            'symptom'                 => 'required',
            'function'                => 'required',
            'emotions_plan'           => 'required',
            'connected_beliefs'       => 'required',
            'meta_meaning'            => 'required',
            'udin_moment'             => 'required',
            'vakogs'                  => 'required',
            'symptoms'                => 'required',
            'regeneration_trigger'    => 'required',
            'regeneration_symptoms_a' => 'required',
            'healing_symptoms'        => 'required',
            'regeneration_symptoms_b' => 'required',
            'meta_practice'           => 'required',
            'action'                  => 'required',
            'follow_up'               => 'required',
            'information'             => 'required',
            'associations'            => 'required',
            'status'                  => 'nullable',
        ];
    }
}
