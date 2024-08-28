<?php

namespace App\Http\Resources\V1\Doctor;
use App\Http\Resources\V1\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\Doctor\DoctorTimeResource;

class DoctorLikedResource extends JsonResource
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
            'bio' => $this->t('bio'),
            'image' => $this->image_url,
            'category' => new CategoryResource($this->category),
            // 'city' => $this->city->t('name'),
            'address' => $this->t('address'),
            'lat' => $this->lat,
            'lng' => $this->lng,
            'rate' => 4,
            'review_count' => $this->rates()->count(),
            'patients_count' => $this->patient_number,
            'experience_years' => $this->experience_years,
            'is_liked' => $this->is_liked,
            'price_per_hour' => $this->price_per_hour,
            'working_time' => DoctorTimeResource::collection($this->times)
        ];
    }
}
