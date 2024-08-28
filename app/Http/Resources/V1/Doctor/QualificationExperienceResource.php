<?php

namespace App\Http\Resources\V1\Doctor;
use App\Http\Resources\V1\Doctor\ExperiencesResource;
use App\Http\Resources\V1\Doctor\QualificationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QualificationExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'qalifications' => QualificationResource::collection($this->qualifications),
            'experiences' => ExperiencesResource::collection($this->experiences),
        ];
    }
}
