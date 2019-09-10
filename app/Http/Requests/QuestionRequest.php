<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'title' => 'required',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('questions', 'id'),
            ],
            'image' => 'nullable',
            'active' => 'required',
            'description' => 'nullable',
        ];
    }
}
