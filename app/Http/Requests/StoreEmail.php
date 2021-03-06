<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmail extends FormRequest
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
            'id' => 'required',
            'address' => ['required', 'string', 'email', 'max:255', 'unique:emails'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Please, select a user',         
        ];
    }
}
