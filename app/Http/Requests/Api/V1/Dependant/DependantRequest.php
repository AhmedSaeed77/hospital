<?php

namespace App\Http\Requests\Api\V1\Dependant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class DependantRequest extends FormRequest
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
            'address' => ['required', 'string'],
            'lat' => ['required', 'string'],
            'lng' => ['required', 'string'],
            'relation' => ['required', 'string'],
            'gender' => 'required|in:male,female',
            'image' => ['nullable','image', 'mimetypes:image/jpeg,image/png,image/gif,image/bmp,image/webp,image/svg+xml,image/x-icon', 'max:5120'],
        ];
    }
}
