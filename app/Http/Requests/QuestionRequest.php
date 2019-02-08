<?php

namespace App\Http\Requests;

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
            'slug' => 'required|unique:questions|max:255',
            'active' => 'required',
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
