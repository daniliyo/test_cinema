<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required', 
                'max:255', 
                $this->id ? Rule::unique('movies')->ignore($this->id) : Rule::unique('movies'),
            ],
            'description' => 'required|max:65535',
            'release_date' => 'required|date_format:Y-m-d',
            'genre' => 'required|array',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.unique' => 'A :input movie is already exists',
            'title.max' => 'Max length of the title field is 255 symbols',
            'description.required' => 'A description is required',
            'description.max' => 'Max length of the title field is 65535 symbols',
            'release_date.required' => 'A release date is required',
            'release_date.date_format' => 'A release date should be format d/m/Y',
            'genre.required' => 'A genre is required',
            'genre.array' => 'A genre should be array',
        ];
    }
}
