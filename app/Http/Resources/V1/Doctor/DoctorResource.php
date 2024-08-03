<?php

namespace App\Http\Resources\V1\Doctor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->t('name'),
            'image' => url($this->image),
            'category' => $this->category->t('name'),
            'city' => $this->city->t('name'),
            'patient_number' => $this->patient_number,
            'experience_years' => $this->experience_years,
            'rate' => 4,
            'review_count' => $this->rates()->count(),
            'is_liked' => $this->is_liked,
        ];
    }
}
