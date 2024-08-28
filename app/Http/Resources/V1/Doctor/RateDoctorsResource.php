<?php

namespace App\Http\Resources\V1\Doctor;
use App\Http\Resources\V1\Rate\RateUserResource;
use Illuminate\Http\Request;
use App\Http\Resources\V1\Doctor\RateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RateDoctorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'rates' => RateResource::collection($this->rates),
        ];
    }
}
