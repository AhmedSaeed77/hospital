<?php

namespace App\Http\Requests\Api\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest
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
            'full_name' => ['required', 'string'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'numeric'],
            'birth_name' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'address' => ['required', 'string'],
            'lat' => ['required', 'string'],
            'lng' => ['required', 'string'],
            'image' => ['required','image', 'mimetypes:image/jpeg,image/png,image/gif,image/bmp,image/webp,image/svg+xml,image/x-icon', 'max:5120'],
        ];
    }
}
