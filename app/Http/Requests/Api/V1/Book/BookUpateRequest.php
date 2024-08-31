<?php

namespace App\Http\Requests\Api\V1\Book;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class BookUpateRequest extends FormRequest
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
            'doctor_id' => ['nullable' , Rule::exists('doctors','id')] ,
            'time' => ['nullable', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'],
            'date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'dependant_id' => ['nullable' , Rule::exists('users','id')] ,
        ];
    }
}
