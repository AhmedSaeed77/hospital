<?php

namespace App\Http\Resources\V1\Advertisement;
use App\Http\Resources\V1\Doctor\DoctorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
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
            'type' => $this->type,
            'image' => $this->image_url,
            'doctor' => new DoctorResource($this->doctor),
        ];
    }
}
