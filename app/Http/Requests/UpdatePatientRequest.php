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
            'name'                    => 'nullable|max:55',
            'age'                     => 'nullable|numeric|max:255',
            'address'                 => 'nullable|max:255',
            'mobile'                  => 'nullable|max:10000000000000|numeric',
            'sex'                     => 'nullable|in:male,famle',  
            'side_dominance'          => 'nullable|in:left,right',
            
            'side_dominance'          => 'nullable|in:left,right',
            'treatments'              => 'nullable|max:255',
            'symptom'                 => 'nullable|max:255',
            'function'                => 'nullable|max:255',
            'emotions_plan'           => 'nullable|max:255',
            'connected_beliefs'       => 'nullable|max:255',
            'meta_meaning'            => 'nullable|max:255',
            'udin_moment'             => 'nullable|max:255',
            'vakogs'                  => 'nullable|max:255',
            'symptoms'                => 'nullable|max:255',
            'regeneration_trigger'    => 'nullable|max:255',
            'regeneration_symptoms_a' => 'nullable|max:255',
            'healing_symptoms'        => 'nullable|max:255',
            'regeneration_symptoms_b' => 'nullable|max:255',
            'meta_practice'           => 'nullable|max:255',
            'action'                  => 'nullable|max:255',
            'follow_up'               => 'nullable|max:255',
            'information'             => 'nullable|max:255',
            'associations'            => 'nullable|max:255',
            'offer'                   => 'nullable|max:255',
            'shock_moment'            => 'nullable|max:255',
            'tretment'                => 'nullable|max:255',
        ];
    }
}
