<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Client extends FormRequest
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
            'enseigne' => ['required', 'string', 'max:100'],
            'note' => ['nullable', 'string'],
            'telephone' => ['nullable', 'numeric', 'max:10'],
            'email' => ['nullable', 'string', 'max:40'],
            'ville' => ['required', 'string', 'max:50'],
            'cp' => ['required', 'numeric', 'max:5'],
            'image' => ['nullable'],
        ];
    }
}
