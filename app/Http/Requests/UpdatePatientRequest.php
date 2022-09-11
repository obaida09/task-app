<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'name'                    => 'nullable',
            'age'                     => 'nullable',
            'address'                 => 'nullable',
            'mobile'                  => 'nullable|numeric|unique:patients,mobile,'.$this->route()->patient->id,
            'sex'                     => 'nullable|in:male,famle',
            
            'side_dominance'          => 'nullable|in:left,right',
            'treatments'              => 'nullable',
            'symptom'                 => 'nullable',
            'function'                => 'nullable',
            'emotions_plan'           => 'nullable',
            'connected_beliefs'       => 'nullable',
            'meta_meaning'            => 'nullable',
            'udin_moment'             => 'nullable',
            'vakogs'                  => 'nullable',
            'symptoms'                => 'nullable',
            'regeneration_trigger'    => 'nullable',
            'regeneration_symptoms_a' => 'nullable',
            'healing_symptoms'        => 'nullable',
            'regeneration_symptoms_b' => 'nullable',
            'meta_practice'           => 'nullable',
            'action'                  => 'nullable',
            'follow_up'               => 'nullable',
            'information'             => 'nullable',
            'associations'            => 'nullable',
        ];
    }
}
