<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    private  array $validateRules=['required','string'];
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question'=>$this->validateRules,
            'correct_answer'=>$this->validateRules,
            'answer1'=>$this->validateRules,
            'answer2'=>$this->validateRules,
            'answer3'=>$this->validateRules,
        ];
    }
}
