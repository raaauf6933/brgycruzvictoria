<?php

namespace App\Http\Requests\Blotter;

use Illuminate\Foundation\Http\FormRequest;

class BlotterRequest extends FormRequest
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
            'complainant' => ['required'],
            'respondent' => ['required'],
            'incharge' => ['required'],
            'statement' => ['required'],
            'is_solved' => ['sometimes']
        ];
    }
}
