<?php

namespace App\Http\Requests\Dashboard\Qualification;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class QualificationRequest extends FormRequest
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
            'university_en' => ['required', 'string'],
            'university_ar' => ['required', 'string'],
            'college_en' => ['required', 'string'],
            'college_ar' => ['required', 'string'],
            'degree_en' => ['required', 'string'],
            'degree_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
        ];
    }
}
