<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/** @psalm-suppress PropertyNotSetInConstructor */
class QuizRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('quizzes', 'id'),
            ],
            'description' => 'required',
            'started_at' => 'nullable|date',
            'active' => 'required',
            'ended_at' => 'nullable|date',
        ];
    }
}
