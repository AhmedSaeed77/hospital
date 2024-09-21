<?php

namespace App\Http\Requests\Dashboard\Doctor;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class DoctorRequest extends FormRequest
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
            'name_ar' => ['required', 'string'],
            'name_en' => ['required', 'string'],
            'address_ar' => ['required', 'string'],
            'address_en' => ['required', 'string'],
            'lat' => ['required'],
            'lng' => ['required'],
            'price_per_hour' => ['required', 'numeric'],
            'patient_number' => ['required','numeric'],
            'experience_years' => ['required','numeric'],
            'category_id' => ['required' , Rule::exists('categories','id')] ,
            'city_id' => ['required' , Rule::exists('cities','id')] ,
            'gender_id' => ['required' , Rule::exists('genders','id')] ,
            'bio_ar' => ['required', 'string'],
            'bio_en' => ['required', 'string'],
            'image' => [
                        $this->isMethod('post') ? 'nullable' : 'nullable',
                        'image',
                        'mimes:jpeg,png,jpg,gif,svg',
                        'max:4096'
                    ],
                    
            'name' => 'required|string',
            'email' => [
                'required',
                'email:rfc,dns',
                $this->method() == 'POST'
                    ? Rule::unique('managers', 'email')
                    : Rule::unique('managers', 'email')->ignore($this->id, 'id')
            ],
            'phone' => [
                'required',
                new Phone,
                $this->method() == 'POST'
                    ? Rule::unique('managers', 'phone')
                    : Rule::unique('managers', 'phone')->ignore($this->id, 'id'),
            ],
            'password' => $this->method() == 'POST'?Password::min(8)->required():'nullable',
            'image' => ['nullable', 'exclude', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}
