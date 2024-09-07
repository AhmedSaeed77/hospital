<?php

namespace App\Http\Requests\Dashboard\Advertisement;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdvertisementRequest extends FormRequest
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
                    'type' => 'required|in:image,doctor', // Ensure type is either 'image' or 'doctor'
                    'image' => [
                            // If method is POST and type is 'image', make 'image' required, otherwise nullable for PUT
                            $this->isMethod('post') || $this->input('type') == 'image' ? 'required' : 'nullable',
                            'image',
                            'mimes:jpeg,png,jpg,gif,svg',
                            'max:4096',
                        ],
                    'doctor_id' => 'required_if:type,doctor|exists:doctors,id', // Validate doctor_id if type is 'doctor'
                ];
    }
}
