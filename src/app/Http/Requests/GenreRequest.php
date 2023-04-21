<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:genres'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A title is required',
            'name.unique' => 'A :input genre is already exists',
            'name.max' => 'Max length of the title field is 255 symbols',
        ];
    }
}
