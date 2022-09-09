<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSessionDetailsRequest extends FormRequest
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
            'offer'          => 'required',
            'shock_moment'   => 'required',
            'tretment'       => 'required',
            'session_notes'  => 'required',
            'session_id'     => 'required',
            'marital_status' => 'required|in:public,private',
            'files'          => 'nullable|max:50',
        ];
    }
}
