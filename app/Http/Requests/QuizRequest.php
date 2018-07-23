<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'slug' => 'required|unique:quizzes|max:255',
            'description' => 'required',
            'started_at' => 'nullable|date',
            'active' => 'required',
            'ended_at' => 'nullable|date',
        ];
    }

    protected function getValidatorInstance()
    {
        $data = $this->all();
        $data['active'] = $this->has('active');
        $this->getInputSource()->replace($data);
        return parent::getValidatorInstance();
    }

}
