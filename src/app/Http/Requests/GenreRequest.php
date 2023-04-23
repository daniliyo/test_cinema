<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            'name' => [
                'required', 
                'max:255', 
                $this->id ? Rule::unique('genres')->ignore($this->id) : Rule::unique('genres'),]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'name.unique' => 'A :input genre is already exists',
            'name.max' => 'Max length of the title field is 255 symbols',
        ];
    }
}
