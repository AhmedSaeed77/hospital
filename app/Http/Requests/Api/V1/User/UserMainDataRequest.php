<?php

namespace App\Http\Requests\Api\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class UserMainDataRequest extends FormRequest
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
                    'full_name' => ['nullable', 'string'],
                    'email' => ['nullable', 'email:rfc,dns'],
                    'phone' => ['nullable', 'numeric'],
                    'birth_name' => ['nullable', 'string'],
                    'birth_date' => ['nullable', 'date'],
                    'address' => ['nullable', 'string'],
                    'lat' => ['nullable', 'string'],
                    'lng' => ['nullable', 'string'],
                    'image' => ['nullable','image', 'mimetypes:image/jpeg,image/png,image/gif,image/bmp,image/webp,image/svg+xml,image/x-icon', 'max:5120'],
                    'password' => ['nullable'],
                ];
    }
}
