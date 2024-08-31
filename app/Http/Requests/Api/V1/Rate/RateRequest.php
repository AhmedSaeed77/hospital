<?php

namespace App\Http\Requests\Api\V1\Rate;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RateRequest extends FormRequest
{
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
            'rate' => ['required', 'numeric'],
            'message' => ['required', 'string'],
            'doctor_id' => ['required' , Rule::exists('doctors','id')] ,
            'book_id' => ['required' , Rule::exists('books','id')] ,
        ];
    }
}
