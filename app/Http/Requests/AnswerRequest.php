<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/** @psalm-suppress PropertyNotSetInConstructor */
class AnswerRequest extends FormRequest
{
    use BooleanTrait;

    /**
     * @var string[] $booleans
     */
    protected $booleans = ['correct', 'active'];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    protected function prepareForValidation()
    {
        $this->prepareBooleanForValidation();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'answer' => 'required',
            'image' => 'nulable|string',
            'active' => 'required',
            'correct' => 'required',
        ];
    }
}
