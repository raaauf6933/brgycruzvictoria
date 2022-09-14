<?php

namespace App\Http\Requests\ServicesRequest;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
        return match(auth()->user()->role->name) {
            'admin' => [
                'user_id' => ['required'],
                'service_id' => ['required'],
                'purpose' => ['required'],
                'remark' => ['sometimes'],
                'status' => ['sometimes'],
            ],
            'resident' => [
                'service_id' => ['required'],
                'purpose' => ['required'],
            ]
        };
 
    }

    public function messages()
    {
        return [
            'user_id.required' => 'The resident field is required',
            'service_id.required' => 'The service field is required',
        ];
    }
}
